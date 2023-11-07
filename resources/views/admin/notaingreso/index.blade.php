@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h1>Nota de Ingreso de Materiales</h1>
@stop

@section('content')


<a class="btn btn-primary mb-3" href="{{ route('admin.detallesingreso.create')}}">+ NUEVA NOTA DE INGRESO</a>
<div class="col-md-6 col-xl-12">
    <h5 style="text-align: right; margin-right: 30px; ">Fecha: {{$fechaActual}}</h5>
</div>
<div class="card">
    <div class="card-body"></div>


    <table id="notaingreso" class="table venta table-striped mt-0.5 table-bordered shadow-lg dt-responsive nowrap">

        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Costo Total</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notaingreso as $nota)
            <tr>
                <td>{{$nota->id}}</td>
                <td>{{$nota->fecha}}</td>
                <td>{{$nota->costototal}}</td>
                
                <td>
                    @foreach($proveedores as $proveedore)
                        @if($nota->id_proveedor == $proveedore->id)
                            <h5><span >{{$proveedore->nombre}}</span></h5>
                        @endif
                    @endforeach
                </td>
                <td>

                    
                        <a href="{{ route('admin.detallesingreso.index',['id' => $nota->id]) }}"
                            class="btn btn-info">detalles <i class="fas fa-eye"></i>
                        </a>
                        
                        {{-- <a class="btn btn-danger text-bold"
                            href="{{ route('admin.notasalidas.pdf',$nota->id)}}">Imprimir<i
                                class="fas fa-file-pdf ml-2"></i>
                        </a>
                        @csrf --}}
                 
                </td>
            </tr>
            @endforeach
        </tbody>
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
    $('#notaingreso').DataTable({
        
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
            'paginate':{
                'next':'Siguiente',
                'previous':'Anterior'
            }
        }
    });
} );
</script>

@stop