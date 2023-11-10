<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bitacora;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role ;

class ProveedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.proveedor.index')->only('index');
        $this->middleware('can:admin.proveedor.create')->only('create', 'store');
        $this->middleware('can:admin.proveedor.edit')->only('edit', 'update');
        $this->middleware('can:admin.proveedor.destroy')->only('destroy');
    }
    
    
    public function index()
    {
        return view('admin.proveedor.index',['proveedores'=>Proveedor::all()]);
    }

    public function create()
    {
        return view('admin.proveedor.crear');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[        
            'nombre'=>'required',
            'email'=>'required',
            'direccion'=>'required',
            'pais'=>'required',
            'telefono'=>'required',
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre = $request->get('nombre');
        $proveedor->email = $request->get('email');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->pais = $request->get('pais');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->save();

        $bitacora = new bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Proveedores';
        $informacionDeBitacora='Registró';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $proveedor->id;        
        $bitacora->save();

        return redirect()->route('admin.proveedor.index');
    }


    public function edit(string $id)
    {
        $proveedor = Proveedor::find($id);

        return view('admin.proveedor.editar',compact('proveedor'));
    }


    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->nombre = $request->get('nombre');
        $proveedor->email = $request->get('email');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->pais = $request->get('pais');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->save();
        
        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Proveedores';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $proveedor->id;        
        $bitacora->save();
        return redirect()->route('admin.proveedor.index');
    }


    public function destroy(string $id)
    {
        $proveedor = Proveedor::find($id);
        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Provedores';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $proveedor->id;        
        $bitacora->save();
        $proveedor->delete();

        return redirect()->route('admin.proveedor.index');
    }

    

}
