@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('content')

    @can('admin.usuarios.create')
        <a class="btn btn-primary mb-3" href="{{ route('admin.usuarios.create') }}">CREAR</a>
    @endcan

    <table id="usuarios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @if (!empty($usuario->getRoleNames()))
                            @foreach ($usuario->getRoleNames() as $rolNombre)
                                <h5><span>{{ $rolNombre }}</span></h5>
                            @endforeach
                        @endif
                    </td>

                    <td>
                        @can('admin.usuarios.destroy')
                            <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST">
                                @csrf

                                @can('admin.usuarios.edit')
                                    <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-info"><i
                                            class="fa fa-edit"></i></a>
                                @endcan

                                @method('DELETE')
                                <button type="submit" class="btn bg-red text-white"><i class="fa fa-trash"></i></button>
                            </form>
                        @endcan
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
            $('#usuarios').DataTable({
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
