<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use App\Models\OrdenProduccion;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;


class OrdenProduccionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.orden_produccion.index')->only('index');
    //     $this->middleware('can:admin.orden_produccion.create')->only('create', 'store');
    //     $this->middleware('can:admin.orden_produccion.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.orden_produccion.destroy')->only('destroy');
    // }

    public function index()
    {
        $producto = Producto::all();
        $orden_produccion = OrdenProduccion::all();
        return view('admin.orden_produccion.index', compact('orden_produccion', 'producto'));
    }

    public function create()
    {
        $orden_produccion = new OrdenProduccion();
        $producto = Producto::all();
        return view('admin.orden_produccion.crear', compact('orden_produccion', 'producto'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'cantidad_a_producir' => 'required',
            'estado' => 'required',
            'fecha_inicio_planificada' => 'required',
            'fecha_final_planificada' => 'required',
            'id_producto' => 'required',
        ]);

        $orden_produccion = new OrdenProduccion();
        $orden_produccion->cantidad_a_producir = $request->get('cantidad_a_producir');
        $orden_produccion->estado = $request->get('estado');
        $orden_produccion->fecha_inicio_planificada = $request->get('fecha_inicio_planificada');
        $orden_produccion->fecha_final_planificada = $request->get('fecha_final_planificada');
        $orden_produccion->id_producto = $request->get('id_producto');

        $orden_produccion->save();

        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'orden_produccion';
        $informacionDeBitacora = 'Registró';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $orden_produccion->id;
        $bitacora->save();

        return redirect()->route('admin.orden_produccion.index');
    }

    public function edit(string $id)
    {
        $orden_produccion = OrdenProduccion::find($id);
        $producto = Producto::all();
        return view('admin.orden_produccion.editar', compact('orden_produccion', 'producto'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate(request(), [
            'cantidad_a_producir' => 'required',
            'estado' => 'required',
            'fecha_inicio_planificada' => 'required',
            'fecha_final_planificada' => 'required',
            'id_producto' => 'required',
        ]);

        $input = $request->all();
        $orden_produccion = OrdenProduccion::find($id);
        $orden_produccion->update($input);

        $orden_produccion->save();
        
        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'orden_produccion';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $orden_produccion->id;        
        $bitacora->save();

        return redirect()->route('admin.orden_produccion.index');
    }

    public function destroy(string $id)
    {
        $orden_produccion = OrdenProduccion::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'orden_produccion';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $orden_produccion->id;        
        $bitacora->save();

        $orden_produccion->delete();
        return redirect()->route('admin.orden_produccion.index');
    }
}
