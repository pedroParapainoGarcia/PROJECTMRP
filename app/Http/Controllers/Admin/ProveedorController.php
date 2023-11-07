<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.proveedor.index',['proveedores'=>Proveedor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proveedor.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validar = $request->validate([        
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

    /**
     * Display the specified resource.
     */
    public function show(proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = Proveedor::find($id);
        return view('admin.proveedor.editar',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validar = $request->validate([        
            'nombre'=>'required',
            'email'=>'required',
            'direccion'=>'required',
            'pais'=>'required',
            'telefono'=>'required',
        ]);
        $proveedor = Proveedor::find($id);
        $proveedor->nombre = $request->get('nombre');
        $proveedor->email = $request->get('email');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->pais = $request->get('pais');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->save();

    
        return redirect()->route('admin.proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        return redirect()->route('admin.proveedor.index');
    }
}
