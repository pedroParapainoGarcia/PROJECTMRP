@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Listado de unidad de medidas</h1>
@stop

@section('content')

    {{-- @can('admin.unidadmedidas.create') --}}
        <a class="btn btn-primary mb-3" href="{{ route('admin.unidadmedidas.create') }}">CREAR</a>
    {{-- @endcan --}}


    <table id="categorias" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">

        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">UidadBase</th>
                <th scope="col">Unidad De Transaccion</th>
                <th scope="col">Multiplicador</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unidades as $unidad)
                <tr>
                    <td>{{ $unidad->id }}</td>
                    <td>{{ $unidad->unidadbase }}</td>
                    <td>{{ $unidad->unidadtransaccion }}</td>
                    <td>{{ $unidad->multiplicador }}</td>

                    <td>

                        <form action="{{ route('admin.unidadmedidas.destroy', $unidad->id) }}" method="POST">
                            {{-- @can('admin.unidadmedidas.edit') --}}
                                <a href="{{ route('admin.unidadmedidas.edit', $unidad->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit"></i></a>
                            {{-- @endcan --}}

                            @csrf
                            @method('DELETE')
                            {{-- @can('admin.unidadmedidas.destroy') --}}
                                <button type="submit" class="btn btn-info"><i class="fa fa-trash"></i></button>
                            {{-- @endcan --}}
                        </form>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
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
            $('#categorias').DataTable({
                //"lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
                responsive: true,
                autoWidth: false,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrando de _MAX_ registros totales)",
                    'search': 'Buscar:',
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                }
            });
        });
    </script>

@stop
