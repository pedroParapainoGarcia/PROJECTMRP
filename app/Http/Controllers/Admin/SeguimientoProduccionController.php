<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrdenProduccion;
use App\Models\SeguimientoProduccion;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class SeguimientoProduccionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.seguimiento_produccion.index')->only('index');
    //     $this->middleware('can:admin.seguimiento_produccion.create')->only('create', 'store');
    //     $this->middleware('can:admin.seguimiento_produccion.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.seguimiento_produccion.destroy')->only('destroy');
    // }

    public function index()
    {
        $seguimiento_produccion = SeguimientoProduccion::all();
        $orden_produccion = OrdenProduccion::all();
        return view('admin.seguimiento_produccion.index', compact('seguimiento_produccion', 'orden_produccion'));
    }

    public function create()
    {
        $orden_produccion = new OrdenProduccion();
        $seguimiento_produccion = SeguimientoProduccion::all();
        return view('admin.seguimiento_produccion.crear', compact('seguimiento_produccion', 'orden_produccion'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'cantidad_producida' => 'required',
            'estado_de_envio' => 'required',
            'fecha_de_envio' => 'required',
            'id_orden_produccion' => 'required',
        ]);

        $seguimiento_produccion = new SeguimientoProduccion();
        $seguimiento_produccion->cantidad_producida = $request->get('cantidad_producida');
        $seguimiento_produccion->estado_de_envio = $request->get('estado_de_envio');
        $seguimiento_produccion->fecha_de_envio = $request->get('fecha_de_envio');
        $seguimiento_produccion->id_orden_produccion = $request->get('id_orden_produccion');

        $seguimiento_produccion->save();

        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'seguimiento_produccion';
        $informacionDeBitacora = 'Registró';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $seguimiento_produccion->id;
        $bitacora->save();

        return redirect()->route('admin.seguimiento_produccion.index');
    }

    public function edit(string $id)
    {
        $seguimiento_produccion = SeguimientoProduccion::all();
        $orden_produccion = OrdenProduccion::find($id);
        return view('admin.seguimiento_produccion.editar', compact('seguimiento_produccion', 'orden_produccion'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate(request(), [
            'cantidad_producida' => 'required',
            'estado_de_envio' => 'required',
            'fecha_de_envio' => 'required',
            'id_orden_produccion' => 'required',
        ]);

        $input = $request->all();
        $seguimiento_produccion = SeguimientoProduccion::find($id);
        $seguimiento_produccion->update($input);

        $seguimiento_produccion->save();
        
        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'seguimiento_produccion';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $seguimiento_produccion->id;        
        $bitacora->save();

        return redirect()->route('admin.seguimiento_produccion.index');
    }


    public function destroy(string $id)
    {
        $seguimiento_produccion = SeguimientoProduccion::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'seguimiento_produccion';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $seguimiento_produccion->id;        
        $bitacora->save();

        $seguimiento_produccion->delete();
        return redirect()->route('admin.seguimiento_produccion.index');
    }
    
}
