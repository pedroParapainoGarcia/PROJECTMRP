<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class LoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.lote.index')->only('index');
        $this->middleware('can:admin.lote.create')->only('create');
        $this->middleware('can:admin.lote.edit')->only('edit', 'update');
        $this->middleware('can:admin.lote.destroy')->only('destroy');
    }
    
    public function index()
    {
        $producto = Producto::all();
        $lote = Lote::all();
        return view('admin.lote.index', compact('lote', 'producto'));
    }

    
    public function create()
    {
        $lote = new Lote();
        $producto = Producto::all();
        return view('admin.lote.crear', compact('lote', 'producto'));
    }

    
    public function store(Request $request)
    {
        $this->validate(request(), [
            'codigo_de_lote' => 'required',
            'cantidad_producida' => 'required',
            'id_producto' => 'required',
        ]);

        $lote = new Lote();
        $lote->codigo_de_lote = $request->get('codigo_de_lote');
        $lote->cantidad_producida = $request->get('cantidad_producida');
        $lote->id_producto = $request->get('id_producto');

        $lote->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Lotes';
        $informacionDeBitacora='Registró';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $lote->id;        
        $bitacora->save();

        return redirect()->route('admin.lote.index');
    }

    
    public function edit(string $id)
    {
        $lote = Lote::find($id);
        $producto = Producto::all();
        return view('admin.lote.editar', compact('lote', 'producto'));
    }

    
    public function update(Request $request, string $id)
    {
        $this->validate(request(), [
            'codigo_de_lote' => 'required',
            'cantidad_producida' => 'required',
            'id_producto' => 'required',
        ]);

        $input = $request->all();
        $lote = Lote::find($id);
        $lote->update($input);

        $lote->save();
        
        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Lotes';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $lote->id;        
        $bitacora->save();

        return redirect()->route('admin.lote.index');
    }

   
    public function destroy(string $id)
    {
        $lote = Lote::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Lotes';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $lote->id;        
        $bitacora->save();

        $lote->delete();
        return redirect()->route('admin.lote.index');
    }
}
