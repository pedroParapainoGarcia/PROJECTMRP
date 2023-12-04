<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use App\Models\Material;
use App\Models\Producto;
use App\Models\Requerimiento;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class RequerimientoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.requerimiento.index')->only('index');
    //     $this->middleware('can:admin.requerimiento.create')->only('create', 'store');
    //     $this->middleware('can:admin.requerimiento.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.requerimiento.destroy')->only('destroy');
    // }
    
    public function index(Request $request)
    {
        $id = $request->id;

        $requerimiento = Requerimiento::where('id_requerimiento', $id)->get();
        $material = Material::all();
        $producto = Producto::all();
        return view('admin.requerimiento.index', compact('requerimiento', 'material', 'producto', 'id'));
    }

    public function create(Request $request)
    {
        $Productos = Producto::select('id', 'nombre', 'descripcion')->get();
        $material = Material::all();
        $ProductosOptions = [];

        foreach ($Productos as $Producto) {
            $descripcion = $Producto->nombre . '-' . $Producto->descripcion . '-' ;

            $productosOptions[$Producto->id] = $descripcion;
        }

        return view('admin.requerimiento.crear', compact('productosOptions', 'material'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'id_producto' => 'required',
            'cantidad_necesaria' => 'required',
        ]);

        $this->validate(request(), [
            'id_material' => 'required',

        ]);

        $id = Auth::id();
        $requerimiento = new Requerimiento();
        $requerimiento->fecha = Carbon::now();
        //$requerimiento->costototal = 0.00; //se actualizara mas adelante al realizar una compra
        $requerimiento->id_material = $request->get('id_material');
        $requerimiento->save();

        $totalmaterial = 0;

        foreach ($request->id_producto as $key => $id_producto) {
            $producto = Producto::find($id_producto);

            $requerimiento = new Requerimiento();
            $requerimiento->id_requerimiento = $requerimiento->id;
            $requerimiento->id_producto = $producto->id;
            $requerimiento->cantidad_necesaria = $request->cantidad_necesaria[$key];
            $subtotal = ($requerimiento->cantidad_necesaria);
            $requerimiento->subtotal = $subtotal;
            $requerimiento->save();

            $totalmaterial += $subtotal;

            //actualizamos el stock del Producto
            $producto->stock += $requerimiento->cantidad_necesaria;
            $producto->save();
        }

        $requerimiento->subtotal = $totalmaterial;
        $requerimiento->save();

        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'requerimiento';
        $informacionDeBitacora = 'Registró';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $requerimiento->id;
        $bitacora->save();


        return redirect()->route('admin.requerimiento.index')->with('success', 'Ingreso de Producto Registrado Correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        $nota = Material::find($id);
        if (!$nota) {
            return redirect()->route('admin.material.index')->with('error', 'ingreso no encontrada');
        }
        Requerimiento::where('id_material', $nota->id)->delete();
        foreach ($nota->detalles as $requerimiento) {
            $material = Material::find($requerimiento->id_material);
            $material->stock += $requerimiento->cantidad;
            $material->save();
        }
        $nota->delete();

        $material = Requerimiento::find($id);
        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Requerimiento';
        $informacionDeBitacora = 'Eliminó';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $requerimiento->id;
        $bitacora->save();
        $material->delete();

        return redirect()->route('admin.material.index')->with('error', 'nota eliminada');
    }
    
}
