@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h3>Crear Nueva Nota de Ingreso de Materiales </h3>
@stop

@section('content')

<head>
  <style>
    .card {
      border: 1px solid #adb5bd;
    }
  </style>
</head>
<div class="container-fluid">
  <div class="card">
    <form action="{{ route ('admin.detallesingreso.store')}}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-row">

          <div class="form-group col-md-6">
            <div class="form-group">

              <label for="id_material">Materiales</label>

              <select class="form-control selectpicker articuloB" data-live-search="true" name="id_producto"
                id="id_producto" lang="es" autofocus>
                <option value="" disabled selected>Buscar Materiales</option>
                @foreach($productosOptions as $value => $description)
                <option value="{{ $value }}">{{ $description }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
              <label for="id_proveedor">Proveedor</label>
                <select required class="form-control" name="id_proveedor" id="id_proveedor">
                    @foreach($proveedores as $proveedor)
                    
                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                    @endforeach
               </select>
            </div>
         </div>

          <div class="form-group col-md-2">
            <div class="form-group">
              <label for="cantidad">Cantidad</label>
              <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" min="0"
                max="10000" oninput="validity.valid||(value='')">
            </div>
          </div>

          <div class="form-group col-md-2">
            <div class="form-group">
              <label for="costounitario">Costo Unitario</label>
              <input type="number" class="form-control" name="costounitario" id="costounitario" aria-describedby="helpId" min="0"
                max="10000" oninput="validity.valid||(value='')">
            </div>
          </div>

         


          <div class="form-group col-md-2 mt-4">
            <div class="form-group mt-2">
              <button type="button" id="agregar" class="btn btn-info float-right" onclick="agregarMaterial()">Agregar
                Material</button>
            </div>
          </div>
        </div>


        <div class="card">
          <div class="card-body">
            <div class="form-group mt-4">
              <h4 class="card-title">Detalles de Ingreso de Materiales</h4>
              <div class="table-responsive col-md-12  table-bordered shadow-lg">
                <table id="detalles" class="table table-striped col-md-12 table-bordered shadow-lg">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>Eliminar</th>
                      <th>Repuesto</th>                    
                      <th>Cantidad</th>
                      <th>Costo Unitario</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer text-muted">
        
          <button type="submit" id="guardar" class="btn btn-success float-right">Registrar</button>
          <a href="{{ route('admin.notaingreso.index')}}" class="btn btn-secondary">Cancelar</a>
        </div>
      </div>

    </form>

  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>


<script>
  function agregarMaterial() {
      var materialId = $('#id_producto').val();
      var materialDescripcion = $('#id_producto option:selected').text();     
      var cantidad = $('#cantidad').val();
      var costounitario  = $('#costounitario').val();
  
      if (materialId  && cantidad && costounitario ) {
        var row = `
          <tr>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarArticulo(this)">Eliminar</button></td>
            <td>${materialDescripcion}<input type="hidden" name="id_producto[]" value="${materialId}"></td>            
            <td>${cantidad}<input type="hidden" name="cantidad[]" value="${cantidad}"></td>
            <td>${costounitario}<input type="hidden" name="costounitario[]" value="${costounitario}"></td>
          </tr>
        `;
        $('#detalles tbody').append(row);
  
        // Clear the input fields after adding the row
        $('#id_producto').val('');        
        $('#cantidad').val('');
        $('#costounitario').val('');
      } else {
        // Show a warning message if any field is missing
        Swal.fire({
          icon: 'warning',
          title: 'Error',
          text: 'Por favor, seleccione un Material, y una cantidad.',
        });
      }
    }
  
    function eliminarArticulo(button) {
      // Remove the row from the table
      $(button).closest('tr').remove();
    }
</script>





@stop