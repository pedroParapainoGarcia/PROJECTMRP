<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lote;
use App\Models\OrdenProduccion;
use App\Models\OrdenTrabajo;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class ProductoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.producto.index')->only('index');
    //     $this->middleware('can:admin.producto.create')->only('create', 'store');
    //     $this->middleware('can:admin.producto.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.producto.destroy')->only('destroy');
    // }

    public function index()
    {
        $lote = Lote::all();
        $orden_trabajo = OrdenTrabajo::all();
        $orden_produccion = OrdenProduccion::all();
        $producto = Producto::all();
        return view('admin.producto.index', compact('producto'));
    }

    public function create()
    {
        $producto = new Producto();
        return view('admin.producto.crear', compact('producto'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $producto = new Producto();

        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock = 0;


        $producto->save();

        $bitacora = new Bitacora();   
            $id = Auth::id();       
            $bitacora->causer_id = $id ;
            $bitacora->name = Role::find($id)->name;
            $bitacora->long_name = 'Producto';
            $informacionDeBitacora='Registró';
            $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
            $bitacora->descripcion = $informacionCifrada;
            $bitacora->subject_id = $producto->id;        
            $bitacora->save();

        return redirect()->route('admin.producto.index');
    }

    public function edit(string $id)
    {
        $producto = Producto::find($id);
        return view('admin.producto.editar', compact('producto'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $input = $request->all();
        $producto = Producto::find($id);
        $producto->update($input);

        $producto->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Producto';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $producto->id;        
        $bitacora->save();

        return redirect()->route('admin.producto.index');
    }

    public function destroy(string $id)
    {
        $producto = Producto::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Producto';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $producto->id;        
        $bitacora->save();

        $producto->delete();
        return redirect()->route('admin.producto.index');
    }
}
