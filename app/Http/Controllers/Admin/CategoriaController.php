<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bitacora;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categorias.index')->only('index');
        $this->middleware('can:admin.categorias.create')->only('create', 'store');
        $this->middleware('can:admin.categorias.edit')->only('edit', 'update');
        $this->middleware('can:admin.categorias.destroy')->only('destroy');
    }

    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }


    public function create()
    {
        return view('admin.categorias.crear');
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'nombres' => 'required',
        ]);
        //dd($request);

        $categorias = new Categoria();
        $categorias->nombres = $request->get('nombres');
        $categorias->save();

        $bitacora = new bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $informacionDeBitacora='Registró';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $categorias->id;        
        $bitacora->save();

        return redirect()->route('admin.categorias.index');
    }


    public function edit(string $id)
    {
        $categorias = Categoria::find($id);
        return view('admin.categorias.editar')->with('categorias', $categorias);
    }


    public function update(Request $request, string $id)
    {
        $categorias = Categoria::find($id);
        $categorias->nombres = $request->get('nombres');
        $categorias->save();

        $bitacora = new bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $categorias->id;        
        $bitacora->save();

        return redirect()->route('admin.categorias.index');
    }


    public function destroy(string $id)
    {
        $categorias = Categoria::find($id);
        $bitacora = new bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $categorias->id;        
        $bitacora->save();
        $categorias->delete();
        return redirect()->route('admin.categorias.index');
    }
}
