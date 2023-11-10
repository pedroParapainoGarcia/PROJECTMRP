<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\bitacora;
use App\Models\Notaingreso;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class NotaingresoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.notaingreso.index')->only('index');
        $this->middleware('can:admin.notaingreso.create')->only('create', 'store');
        $this->middleware('can:admin.notaingreso.edit')->only('edit', 'update');
        $this->middleware('can:admin.notaingreso.destroy')->only('destroy');
    }


    public function index(Request $request)
    {
        $id = $request->id;
        $notaingreso = Notaingreso::all();
        $fechaActual = Carbon::now();
        $proveedores = Proveedor::all();

        return view('admin.notaingreso.index', compact('notaingreso', 'fechaActual', 'id', 'proveedores'));
    }


    public function create(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        //
    }

    public function destroy(string $id)
    {
        
    }
}
