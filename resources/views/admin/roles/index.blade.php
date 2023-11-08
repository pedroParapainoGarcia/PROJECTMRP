@extends('adminlte::page')

@section('title', 'sistema de informacion 1')

@section('content_header')
<h1>Listado de Roles</h1>
@stop

@section('content')


<a class="btn btn-primary mb-3" href="{{ route('admin.roles.create')}}">CREAR</a>


<table id="roles" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Rol</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>

            <td>
                
                <form action="{{ route ('admin.roles.destroy',$role->id)}}" method="POST">
                    
                    <a href="{{ route('admin.roles.edit',$role->id)}}" class="btn btn-info"><i
                        class="fa fa-edit"></i></a>
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-red text-white"><i class="fa fa-trash"></i></button>
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
    $('#roles').DataTable({
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
            'paginate':{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
    });
} );
</script>

@stop