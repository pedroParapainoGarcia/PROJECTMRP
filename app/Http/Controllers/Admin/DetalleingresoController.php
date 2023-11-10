<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Detalleingreso;
use App\Models\Notaingreso;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\Models\User;

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
        $trabajador = Role::find($id)->name;


        $detalleingreso = Detalleingreso::where('id_notaingreso', $id)->get();
        $productos = Producto::all();
        $notadeingresos = Notaingreso::all();
        return view('admin.detallesingreso.index', compact('detalleingreso', 'productos', 'notadeingresos', 'id', 'trabajador'));
    }

    public function create(Request $request)
    {
        $productos = Producto::select('id', 'nombre', 'descripcion', 'id_categoria')->get();
        $proveedores = Proveedor::all();
        $productosOptions = [];

        foreach ($productos as $producto) {
            $categoria = $producto->categorias->nombres ?? 'Sin marca';
            $descripcion = $producto->nombre . '-' . $producto->descripcion . '-'. $categoria ;
            
            $productosOptions[$producto->id] = $descripcion;
        }

        return view('admin.detallesingreso.crear', compact('productosOptions', 'proveedores'));
    }


    public function store(Request $request)
    {
       $this->validate(request(), [
            'id_producto' => 'required',
            'cantidad' => 'required',
            'costounitario' => 'required'
        ]);

        $this->validate(request(), [
            'id_proveedor' => 'required',

        ]);
     
            $id = Auth::id();
            $notaingreso = new Notaingreso();
            $notaingreso->fecha = Carbon::now();
            $notaingreso->costototal = 0.00; //se actualizara mas adelante al realizar una compra
            $notaingreso->id_proveedor = $request->get('id_proveedor');
            $notaingreso->save();       
        
        $totalnota = 0;

        foreach ($request->id_producto as $key => $id_producto) {
            $producto = Producto::find($id_producto);

            $detalleingreso = new Detalleingreso();
            $detalleingreso->id_notaingreso = $notaingreso->id;
            $detalleingreso->id_producto = $producto->id;
            $detalleingreso->cantidad = $request->cantidad[$key];
            $detalleingreso->costounitario = $request->costounitario[$key];
            $subtotal = ($detalleingreso->costounitario * $detalleingreso->cantidad);
            $detalleingreso->subtotal = $subtotal;
            $detalleingreso->save();

            $totalnota += $subtotal;

            //actualizamos el stock del producto
            $producto->stock += $detalleingreso->cantidad;
            $producto->save();
        }

        $notaingreso->costototal = $totalnota;
        $notaingreso->save();



        return redirect()->route('admin.notaingreso.index')->with('success', 'Ingreso de Material Registrada Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nota = Notaingreso::find($id);
        if (!$nota) {
            return redirect()->route('admin.notaingreso.index')->with('error', 'ingreso no encontrada');
        }

        Detalleingreso::where('id_notaingreso', $nota->id)->delete();
        foreach ($nota->detalles as $detalleingreso) {
            $producto = Producto::find($detalleingreso->id_producto);
            $producto->stock += $detalleingreso->cantidad;
            $producto->save();
        }

        $nota->delete();

        return redirect()->route('admin.notaingreso.index')->with('error', 'nota eliminada');
    }
}
