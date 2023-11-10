@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>BITACORA</h1>
@stop

@section('content')


<table id="bitacoras" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-custom-red text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
            <th scope="col">Autor ID</th>
            <th scope="col">Tabla</th>
            <th scope="col">Accion</th>
            <th scope="col">ID Implicado</th>
            <th scope="col">Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bitacoras as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->causer_id}}</td>
            <td>{{$row->long_name}}</td>
            <td>{{$row->descripcion}}</td>
            <td>{{$row->subject_id}}</td>
            <td>{{$row->created_at}}</td>


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
    $('#bitacoras').DataTable({        
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