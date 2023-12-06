<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lote;
use App\Models\OrdenProduccion;
use App\Models\OrdenTrabajo;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class ProductoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.producto.index')->only('index');
    //     $this->middleware('can:admin.producto.create')->only('create', 'store');
    //     $this->middleware('can:admin.producto.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.producto.destroy')->only('destroy');
    // }

    public function index(Request $request)
    {
        $id = $request->id;
        $productos = Producto::all();
        $fechaActual = Carbon::now();    

        return view('admin.producto.index', compact('productos', 'fechaActual', 'id'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
    }

    public function edit(string $id)
    {
      
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }
}
