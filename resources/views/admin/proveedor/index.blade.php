@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Listado de Proveedores</h1>
@stop

@section('content')

    @can('admin.proveedor.create')
        <a class="btn btn-primary mb-3" href="{{ route('admin.proveedor.create') }}">CREAR</a>
    @endcan

    <table id="proveedor" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">

        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Direccion</th>
                <th scope="col">Pais</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>{{ $proveedor->pais }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>
                        <form action="{{ route('admin.proveedor.destroy', $proveedor->id) }}" method="POST">
                            @can('admin.proveedor.edit')
                                <a href="{{ route('admin.proveedor.edit', $proveedor->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit"></i></a>
                            @endcan
                            @csrf
                            @method('DELETE')
                            @can('admin.proveedor.destroy')
                                <button type="submit" class="btn btn-info"><i class="fa fa-trash"></i></button>
                            @endcan
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
            $('#proveedor').DataTable({
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
