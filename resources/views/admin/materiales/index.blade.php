@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Registro de Materiales</h1>
@stop

@section('content')

    {{-- @can('admin.materiales.create') --}}
        <a class="btn btn-primary mb-3" href="{{ route('admin.materiales.create') }}">CREAR</a>
    {{-- @endcan --}}

    <table id="lotes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">

        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">UnidadMedida</th>
                <th scope="col">Categoria</th>
                <th scope="col">Stock</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materiales as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->nombre }}</td>
                    <td>{{ $material->descripcion }}</td>

                    <td>
                        @foreach ($unidadmedida as $umedida)
                            @if ($material->id_unidadmedida == $umedida->id)
                                <h5><span>{{ $umedida->unidadtransaccion }}</span></h5>
                            @endif
                        @endforeach
                    </td>

                    <td>
                        @foreach ($categoria as $cat)
                            @if ($material->id_unidadmedida == $cat->id)
                                <h5><span>{{ $cat->nombres }}</span></h5>
                            @endif
                        @endforeach
                    </td>

                    <td>{{ $material->stock }}</td>  

                    <td>
                        {{-- @can('admin.material.destroy') --}}
                            <form action="{{ route('admin.materiales.destroy', $material->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-info"><i class="fa fa-trash"></i></button>
                            </form>
                        {{-- @endcan --}}
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

    <!-- SUM()  Datatables-->
    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>

    <script>
        $(document).ready(function() {
            $('#materials').DataTable({
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
