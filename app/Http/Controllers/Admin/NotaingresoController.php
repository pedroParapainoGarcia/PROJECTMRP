<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
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

    public function report(){
        return view('admin.notaingreso.reporte');
    }

    public function generar(Request $request)
    {
        $fechaInicio = $request->input('fechainicio');
        $fechaFin = $request->input('fechafin');
        $proveedores=Proveedor::all();
    
        // Buscar las notas de venta que estén entre las fechas especificadas
        $notaingresos = Notaingreso::whereBetween('fecha', [$fechaInicio, $fechaFin])->get();

        if ($notaingresos->isEmpty()) {
            // Si no se encontraron notas de compra, redirigir al usuario con un mensaje de error
            return redirect()->route('admin.notaingreso.report')
                ->with('error', 'No se encontraron compras entre las fechas especificadas.');
        }
        $request->session()->forget('error');
        // Cargar la vista del PDF con los datos de las notas de compra
        $pdf = \PDF::loadView('admin.notaingreso.pdf', compact('notaingresos','proveedores','fechaInicio','fechaFin'));
        $pdf->setPaper('A4', 'portrait');
    
        return $pdf->download($fechaInicio. ' -> ' .$fechaFin.' .pdf');
    }
}
