<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Material;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class MaterialController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.material.index')->only('index');
    //     $this->middleware('can:admin.material.create')->only('create', 'store');
    //     $this->middleware('can:admin.material.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.material.destroy')->only('destroy');
    // }

    public function index()
    {
        $categoria = Categoria::all();
        $material = Material::all();
        return view('admin.material.index', compact('material', 'categoria'));
    }

    public function create()
    {
        $material = new Material();
        $categoria = Categoria::all();
        return view('admin.material.crear', compact('material', 'categoria'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidad_de_medida' => 'required',
            'id_categoria' => 'required',
        ]);

        $material = new Material();

        $material->nombre = $request->get('nombre');
        $material->descripcion = $request->get('descripcion');
        $material->unidad_de_medida = $request->get('unidad_de_medida');
        $material->id_categoria = $request->get('id_categoria');
        $material->stock = 0;


        $material->save();

        $bitacora = new Bitacora();   
            $id = Auth::id();       
            $bitacora->causer_id = $id ;
            $bitacora->name = Role::find($id)->name;
            $bitacora->long_name = 'Material';
            $informacionDeBitacora='Registró';
            $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
            $bitacora->descripcion = $informacionCifrada;
            $bitacora->subject_id = $material->id;        
            $bitacora->save();

        return redirect()->route('admin.material.index');
    }

    public function edit(string $id)
    {
        $material = Material::find($id);
        $categoria = Categoria::all();
        return view('admin.material.editar', compact('material', 'categoria'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidad_de_medida' => 'required',
            'id_categoria' => 'required',
        ]);

        $input = $request->all();
        $material = Material::find($id);
        $material->update($input);

        $material->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Material';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $material->id;        
        $bitacora->save();

        return redirect()->route('admin.material.index');
    }

    public function destroy(string $id)
    {
        $material = Material::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Material';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $material->id;        
        $bitacora->save();

        $material->delete();
        return redirect()->route('admin.material.index');
    }
}
