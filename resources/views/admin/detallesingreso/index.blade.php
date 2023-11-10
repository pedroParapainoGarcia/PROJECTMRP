@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Detatalles</h1>
@stop

@section('content')

    @can('admin.notaingreso.index')
        <a class="btn btn-primary mb-3" href="{{ route('admin.notaingreso.index') }}">Volver</a>
    @endcan

    @can('admin.notaingreso.index')
        <a class="btn btn-primary mb-3" href="{{ route('admin.detallesingreso.create') }}">Agregar Material</a>
    @endcan

    {{-- <a href="{{ route('admin.detallecompras.index',['id' => $nota->id]) }}" class="btn btn-info">Ver detalles</a> --}}

    <div class="card">

        <div class="card-body">

            <div class="form-group row">

                <div class="col-md-4 text-center">
                    <label class="form-control-label"><strong>Número Nota Ingreso</strong></label>
                    <p>{{ $id }}</p>
                </div>

                <div class="col-md-4 text-center">
                    <label class="form-control-label"><strong>Trabajador</strong></label>
                    <p>{{ $trabajador }}</p>
                </div>
            </div>

            <table id="detalleingreso" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">SubTotal</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalleingreso as $detalle)
                        <tr>
                            <td>
                                @foreach ($productos as $producto)
                                    @if ($detalle->id_producto == $producto->id)
                                        <h5><span>{{ $producto->nombre }}</span></h5>
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                @foreach ($productos as $producto)
                                    @if ($detalle->id_producto == $producto->id)
                                        <h5><span>{{ $producto->descripcion }}</span></h5>
                                    @endif
                                @endforeach
                            </td>


                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->costounitario }}</td>
                            <td>{{ $detalle->subtotal }}</td>

                            <td>
                                {{-- <form action="{{ route('admin.detalleventas.destroy', $detalle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')                        
                                <button type="submit" class="btn bg-custom-red text-white"><i class="fa fa-trash"></i></button>
                            </form>  --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                </tfoot>
            </table>
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

    <script>
        $(document).ready(function() {
            $('#detalleingreso').DataTable({

                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar" +
                        `<select>
                <option value = '5'>5</option>
                <option value = '10'>10</option>
                <option value = '25'>25</option>
                <option value='100'>100</option>
                <option value='-1'>All</option>
                </select>` +
                        "registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrando de _MAX_ registros totales)",
                    'search': 'Buscar:',
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                },
                "drawCallback": function() {
                    var api = this.api();
                    $(api.column(4).footer()).html(
                        'Total: ' + api.column(4, {
                            page: 'current'
                        }).data().reduce(function(a, b) {
                            return parseFloat(a) + parseFloat(b);
                        }, 0)
                    );
                }
            });
        });
    </script>

@stop
