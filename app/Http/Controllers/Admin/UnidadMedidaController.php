<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    public function index()
    {
        $unidades = UnidadMedida::all();
        return view('admin.unidadmedidas.index', compact('unidades'));
    }


    public function create()
    {
        return view('admin.unidadmedidas.crear');
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'unidadbase' => 'required',
            'unidadtransaccion' => 'required',
            'multiplicador' => 'required',
        ]);
        //dd($request);

        $unidadmedida = new UnidadMedida();
        $unidadmedida->unidadbase = $request->get('unidadbase');
        $unidadmedida->unidadtransaccion = $request->get('unidadtransaccion');
        $unidadmedida->multiplicador = $request->get('multiplicador');
        $unidadmedida->save();

     

        return redirect()->route('admin.unidadmedidas.index');
    }


    public function edit(string $id)
    {
        $unidadmedida = UnidadMedida::find($id);
        return view('admin.unidadmedidas.editar')->with('unidadmedida', $unidadmedida);
    }


    public function update(Request $request, string $id)
    {
        $unidadmedida = UnidadMedida::find($id);
        $unidadmedida->unidadbase = $request->get('unidadbase');
        $unidadmedida->unidadtransaccion = $request->get('unidadtransaccion');
        $unidadmedida->multiplicador = $request->get('multiplicador');
        $unidadmedida->save();

        

        return redirect()->route('admin.unidadmedidas.index');
    }


    public function destroy(string $id)
    {
        $unidadmedida = UnidadMedida::find($id);        
        $unidadmedida->delete();
        return redirect()->route('admin.unidadmedidas.index');
    }
}
