<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bitacora;
use App\Models\Material;
use App\Models\Producto;
use App\Models\Requerimiento;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class RequerimientoController extends Controller
{



    public function index(Request $request)
    {
        $id = $request->id;

        $id = Auth::id();
        $trabajador = Role::find($id)->name;


        $detallerequerimiento = Requerimiento::where('id_producto', $id)->get();
        $materiales  = Material::all();
        $productos = Producto::all();
        return view('admin.requerimiento.index', compact('detallerequerimiento', 'materiales', 'productos', 'id', 'trabajador'));
    }

    public function create(Request $request)
    {
        $materiales = Material::select('id', 'nombre', 'descripcion', 'id_categoria')->get();
        $materialOptions = [];

        foreach ($materiales as $material) {
            $categoria = $material->categorias->nombres ?? 'Sin nombre';
            $descripcion = $material->nombre . '-' . $material->descripcion . '-' . $categoria;

            $materialOptions[$material->id] = $descripcion;
        }

        return view('admin.requerimiento.crear', compact('productosOptions', 'proveedores'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_material' => 'required',
            'cantidad' => 'required',
            'costounitario' => 'required'
        ]);

        $this->validate(request(), []);

        $id = Auth::id();
        $producto = new Producto();
        $producto->nombre =$request->get('nombre');
        $producto->descripcion =$request->get('descripcion');
        $producto->costoproduccion = 0.00; //se actualizara mas adelante al realizar un requerimiento
        
        $producto->save();

        $totalcosto = 0;

        foreach ($request->id_material as $key => $id_material) {
            $material = Material::find($id_material);

            $detallerequerimiento = new Requerimiento();
            $detallerequerimiento->id_producto = $producto->id;
            $detallerequerimiento->id_material = $material->id;
            $detallerequerimiento->cantidad = $request->cantidad[$key];
            $detallerequerimiento->costounitario = $request->costounitario[$key];
            $subtotal = ($detallerequerimiento->costounitario * $detallerequerimiento->cantidad);
            $detallerequerimiento->subtotal = $subtotal;
            $detallerequerimiento->save();

            $totalcosto += $subtotal;

            //actualizamos el stock del producto
            $material->stock += $detallerequerimiento->cantidad;
            $material->save();
        }

        $producto->costoproduccion = $totalcosto;
        $producto->save();

       return redirect()->route('admin.requerimiento.index')->with('success', 'regigistro de requerimiento exitosamente');
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
        $producto = Producto::find($id);
        if (!$producto) {
            return redirect()->route('admin.producto.index')->with('error', 'producto no encontrado');
        }
        Requerimiento::where('id_producto', $producto->id)->delete();
        foreach ($producto->detalles as $detallerequerimiento) {
            $material = Material::find($detallerequerimiento->id_producto);
            $material->stock += $detallerequerimiento->cantidad;
            $material->save();
        }
        $producto->delete(); 
       

        return redirect()->route('admin.producto.index')->with('error', 'nota eliminada');
    }

   
}
