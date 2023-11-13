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
        $productos = Producto::all();
        $lotes = Lote::all();
        return view('admin.lote.index', compact('lotes', 'productos'));
    }

    
    public function create()
    {
        $lotes = new Lote();
        $productos = Producto::all();
        return view('admin.lote.crear', compact('lotes', 'productos'));
    }

    
    public function store(Request $request)
    {
        $this->validate(request(), [
            'codigo' => 'required',
            'cantidad' => 'required',
            'id_producto' => 'required',
        ]);

        $lotes = new Lote();
        $lotes->codigo = $request->get('codigo');
        $lotes->cantidad = $request->get('cantidad');
        $lotes->id_producto = $request->get('id_producto');

        $lotes->save();

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Lotes';
        $informacionDeBitacora='Registró';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $lotes->id;        
        $bitacora->save();

        return redirect()->route('admin.lote.index');
    }

    
    public function edit(string $id)
    {
        $lotes = Lote::find($id);
        $productos = Producto::all();
        return view('admin.lote.editar', compact('lotes', 'productos'));
    }

    
    public function update(Request $request, string $id)
    {
        $this->validate(request(), [
            'codigo' => 'required',
            'cantidad' => 'required',
            'id_producto' => 'required',
        ]);

        $input = $request->all();
        $lotes = Lote::find($id);
        $lotes->update($input);

        $lotes->save();
        
        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Lotes';
        $informacionDeBitacora='Actualizó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $lotes->id;        
        $bitacora->save();

        return redirect()->route('admin.lote.index');
    }

   
    public function destroy(string $id)
    {
        $lotes = Lote::find($id);

        $bitacora = new Bitacora();   
        $id = Auth::id();       
        $bitacora->causer_id = $id ;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Lotes';
        $informacionDeBitacora='Eliminó';
        $informacionCifrada=Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $lotes->id;        
        $bitacora->save();

        $lotes->delete();
        return redirect()->route('admin.lote.index');
    }
}
