<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Detalleingreso;
use App\Models\Material;
use App\Models\Notaingreso;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class DetalleingresoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.detallesingreso.index')->only('index');
        $this->middleware('can:admin.detallesingreso.create')->only('create', 'store');
        $this->middleware('can:admin.detallesingreso.edit')->only('edit', 'update');
        $this->middleware('can:admin.detallesingreso.destroy')->only('destroy');
    }


    public function index(Request $request)
    {
        $id = $request->id;

        $id = Auth::id();
        $empleado = Role::find($id)->name;

        $detalleingreso = Detalleingreso::where('id_notaingreso', $id)->get();
        $material = Material::all();
        $notaingreso = Notaingreso::all();
        return view('admin.detallesingreso.index', compact('detalleingreso', 'material', 'notaingreso', 'id', 'empleado'));
    }

    public function create(Request $request)
    {
        $Materiales = Material::select('id', 'nombre', 'descripcion', 'id_categoria')->get();
        $proveedores = Proveedor::all();
        $MaterialesOptions = [];

        foreach ($Materiales as $Material) {
            $categoria = $Material->categorias->nombres ?? 'Sin marca';
            $descripcion = $Material->nombre . '-' . $Material->descripcion . '-' . $categoria;

            $materialesOptions[$Material->id] = $descripcion;
        }

        return view('admin.detallesingreso.crear', compact('materialesOptions', 'proveedores'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'id_material' => 'required',
            'cantidad' => 'required',
            'costounitario' => 'required'
        ]);

        $this->validate(request(), [
            'id_proveedor' => 'required',

        ]);

        $id = Auth::id();
        $notaingreso = new Notaingreso();
        $notaingreso->fecha_compra = Carbon::now();
        $notaingreso->descripcion = $request->get('descripcion');
        $notaingreso->costo_total = 0.00; //se actualizara mas adelante al realizar una compra
        $notaingreso->id_proveedor = $request->get('id_proveedor');
        $notaingreso->save();

        $totalnota = 0;

        foreach ($request->id_material as $key => $id_material) {
            $material = Material::find($id_material);

            $detalleingreso = new Detalleingreso();
            $detalleingreso->id_notaingreso = $notaingreso->id;
            $detalleingreso->id_material = $material->id;
            $detalleingreso->cantidad = $request->cantidad[$key];
            $detalleingreso->costounitario = $request->costounitario[$key];
            $subtotal = ($detalleingreso->costounitario * $detalleingreso->cantidad);
            $detalleingreso->subtotal = $subtotal;
            $detalleingreso->save();

            $totalnota += $subtotal;

            //actualizamos el stock del Material
            $material->stock += $detalleingreso->cantidad;
            $material->save();
        }

        $notaingreso->costototal = $totalnota;
        $notaingreso->save();

        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Detalleingreso';
        $informacionDeBitacora = 'Registró';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $detalleingreso->id;
        $bitacora->save();


        return redirect()->route('admin.notaingreso.index')->with('success', 'Ingreso de Material Registrado Correctamente');
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy($id)
    {
        $nota = Notaingreso::find($id);
        if (!$nota) {
            return redirect()->route('admin.notaingreso.index')->with('error', 'ingreso no encontrada');
        }
        Detalleingreso::where('id_notaingreso', $nota->id)->delete();
        foreach ($nota->detalles as $detalleingreso) {
            $material = Material::find($detalleingreso->id_material);
            $material->stock += $detalleingreso->cantidad;
            $material->save();
        }
        $nota->delete();

        $notaingreso = Detalleingreso::find($id);
        $bitacora = new Bitacora();
        $id = Auth::id();
        $bitacora->causer_id = $id;
        $bitacora->name = Role::find($id)->name;
        $bitacora->long_name = 'Detalleingreso';
        $informacionDeBitacora = 'Eliminó';
        $informacionCifrada = Crypt::encrypt($informacionDeBitacora);
        $bitacora->descripcion = $informacionCifrada;
        $bitacora->subject_id = $detalleingreso->id;
        $bitacora->save();
        $notaingreso->delete();

        return redirect()->route('admin.notaingreso.index')->with('error', 'nota eliminada');
    }

    public function generatePDF($id)
    {
        $notaDeCompra = Notaingreso::findOrFail($id);

        $costoTotal = $notaDeCompra->costototal;
        $fecha = $notaDeCompra->fecha;

        $proveedor = $notaDeCompra->proveedors->nombre;
        $direccion = $notaDeCompra->proveedors->direccion;
        $Spdf = $proveedor . ' - ' . $fecha;


        $data = [
            'detallecompras' => Detalleingreso::where('id_notaingreso', $id)->get(),
            'costoTotal' => $costoTotal,
            'proveedor' => $proveedor,
            'direccion' => $direccion,
            'fecha' => $fecha,
        ];


        $pdf = \PDF::loadView('admin.detallesingreso.pdf', $data);
        $pdf->setPaper('A4', 'portrait');


        return $pdf->download($Spdf . '.pdf');
    }
}
