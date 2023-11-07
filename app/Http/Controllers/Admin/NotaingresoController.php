<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notaingreso;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NotaingresoController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $notaingreso=Notaingreso::all();        
        $fechaActual = Carbon::now();
        $proveedores=Proveedor::all();

        return view('admin.notaingreso.index', compact('notaingreso', 'fechaActual','id','proveedores'));
    }


    public function create(Request $request)
    {
        //

    }

    public function store(Request $request)
    {
        //        
    }

    public function show($id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
