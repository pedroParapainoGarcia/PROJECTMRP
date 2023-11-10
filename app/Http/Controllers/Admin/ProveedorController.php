<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor;
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
    
        return redirect()->route('admin.proveedor.index');
    }


    public function destroy(string $id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();

        return redirect()->route('admin.proveedor.index');
    }

}
