<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
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

        $categoria = new Categoria();
        $categoria->nombres = $request->get('nombres');
        $categoria->save();

        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $informacionDeBitacora = 'Registró';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $categoria->id;
        $bitacora->save();

        return redirect()->route('admin.categorias.index');
    }


    public function edit(string $id)
    {
        $categoria = Categoria::find($id);
        return view('admin.categorias.editar')->with('categorias', $categoria);
    }


    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombres = $request->get('nombres');
        $categoria->save();

        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $informacionDeBitacora = 'Actualizó';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $categoria->id;
        $bitacora->save();

        return redirect()->route('admin.categorias.index');
    }


    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Categoria';
        $informacionDeBitacora = 'Eliminó';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $categoria->id;
        $bitacora->save();
        $categoria->delete();
        return redirect()->route('admin.categorias.index');
    }
}
