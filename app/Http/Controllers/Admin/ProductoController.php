<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Http\Controllers\Api\CategoriaController;

class ProductoController extends Controller
{
    public function index()
    {
        
         $categorias = Categoria::all(); 
         $productos= Producto::all();
        return view('admin.productos.index',compact('productos','categorias'));
    }


    public function create()
    {
        $producto = new Producto();
        // $categorias = Categoria::pluck('nombres','id');
        $categorias = Categoria::all();
         
        return view('admin.productos.crear',compact('producto','categorias'));
    
        // $modelo = new Modelo();
        // $marcas= Marca::pluck('nombre','id');   
        // return view('admin.modelos.crear',compact('modelo','marcas'));
    }


    public function store(Request $request)
    {
        $this->validate(request(),[        
            'nombre'=>'required',
            'descripcion'=>'required',
            'id_categoria'=>'required',
            
            
        ]);

            $producto = new Producto();

            $producto->nombre = $request->get('nombre');
            $producto->descripcion = $request->get('descripcion');
            $producto->id_categoria = $request->get('id_categoria');          
            $producto->stock=0;

           
            $producto->save();

       
        
         return redirect()->route('admin.productos.index');

       
    }

    public function edit($id)
    {
        $producto = Producto::find($id);        
        $categoria= Categoria::all();
        return view('admin.productos.editar',compact('producto','categoria'));

    }

    public function update(Request $request,$id)
    {
        $this->validate(request(), [
            'nombre'=>'required',
            'descripcion'=>'required',
            'id_categoria'=>'required'
        ]);
            
        $input = $request->all();
        $producto = Producto::find($id);
        $producto->update($input);

        $producto->save();

    
        return redirect()->route('admin.productos.index');

    }


    public function destroy(string $id)
    {
        $producto =Producto::find($id);


        $producto->delete();
        return redirect()->route('admin.productos.index');


    }




   

}
