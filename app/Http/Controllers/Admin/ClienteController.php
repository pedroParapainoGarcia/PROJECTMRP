<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ClienteController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.cliente.index')->only('index');
    //     $this->middleware('can:admin.cliente.create')->only('create', 'store');
    //     $this->middleware('can:admin.cliente.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.cliente.destroy')->only('destroy');
    // }

    public function index()
    {
        return view('admin.cliente.index', ['clientes' => Cliente::all()]);
    }

    public function create()
    {
        return view('admin.cliente.crear');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required|integer',  
        ]); 

        $cliente = new Cliente();
        $cliente->nombre = $request->get('nombre');
        $cliente->email = $request->get('email');
        $cliente->telefono = $request->get('telefono');
        $cliente->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Clientes';
        $bitacora->descripcion = 'Registró';
        $bitacora->subject_id = $cliente->id;        
        $bitacora->save();

        return redirect()->route('admin.cliente.index'); 
    }

    public function edit(string $id)
    {
        $cliente = Cliente::find($id);     
        return view('admin.cliente.editar',compact('cliente'));
    }

    public function update(Request $request, string $id)
    {
        $cliente = Cliente::find($id);

        $cliente->nombre = $request->get('nombre');
        $cliente->email = $request->get('email');
        $cliente->telefono = $request->get('telefono');
        $cliente->save();
    
        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Clientes';
        $bitacora->descripcion = 'Actualizó';
        $bitacora->subject_id = $cliente->id;
        $bitacora->save();
    
        return redirect()->route('admin.cliente.index');
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Clientes';
        $bitacora->descripcion = 'Eliminó';
        $bitacora->subject_id = $cliente->id;        
        $bitacora->save();

        $cliente->delete();
        return redirect()->route('admin.cliente.index');
    }
}
