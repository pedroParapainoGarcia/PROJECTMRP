<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use App\Models\OrdenTrabajo;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class OrdenTrabajoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.orden_trabajo.index')->only('index');
    //     $this->middleware('can:admin.orden_trabajo.create')->only('create', 'store');
    //     $this->middleware('can:admin.orden_trabajo.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.orden_trabajo.destroy')->only('destroy');
    // }

    public function index()
    {
        $producto = Producto::all();
        $orden_trabajo = OrdenTrabajo::all();
        return view('admin.orden_trabajo.index', compact('orden_trabajo', 'producto'));
    }

    public function create()
    {
        $orden_trabajo = new OrdenTrabajo();
        $producto = Producto::all();
        return view('admin.orden_trabajo.crear', compact('orden_trabajo', 'producto'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'cantidad_a_producir' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'fecha_inicio_planificada' => 'required',
            'fecha_final_planificada' => 'required',
            'id_producto' => 'required',
        ]);

        $orden_trabajo = new OrdenTrabajo();
        $orden_trabajo->cantidad_a_producir = $request->get('cantidad_a_producir');
        $orden_trabajo->descripcion = $request->get('descripcion');
        $orden_trabajo->estado = $request->get('estado');
        $orden_trabajo->fecha_inicio_planificada = $request->get('fecha_inicio_planificada');
        $orden_trabajo->fecha_final_planificada = $request->get('fecha_final_planificada');
        $orden_trabajo->id_producto = $request->get('id_producto');

        $orden_trabajo->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'orden_trabajo';
        $informacionDeBitacora='Registró';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $orden_trabajo->id;        
        $bitacora->save();

        return redirect()->route('admin.orden_trabajo.index');
    }

    public function edit(string $id)
    {
        $orden_trabajo = OrdenTrabajo::find($id);
        $producto = Producto::all();
        return view('admin.orden_trabajo.editar', compact('orden_trabajo', 'producto'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate(request(), [
            'cantidad_a_producir' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'fecha_inicio_planificada' => 'required',
            'fecha_final_planificada' => 'required',
            'id_producto' => 'required',
        ]);

        $input = $request->all();
        $orden_trabajo = OrdenTrabajo::find($id);
        $orden_trabajo->update($input);

        $orden_trabajo->save();
        
        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'orden_trabajo';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $orden_trabajo->id;        
        $bitacora->save();

        return redirect()->route('admin.orden_trabajo.index');
    }

    public function destroy(string $id)
    {
        $orden_trabajo = OrdenTrabajo::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'orden_trabajo';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $orden_trabajo->id;        
        $bitacora->save();

        $orden_trabajo->delete();
        return redirect()->route('admin.orden_trabajo.index');
    }
}
