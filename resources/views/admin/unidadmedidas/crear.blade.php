@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Crear Nueva UnidadMedida</h1>
@stop

@section('content')
    <form action="{{ route('admin.unidadmedidas.store') }}" method="POST">
        @csrf

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="" class="form-label">Nombre de la UnidadBase</label>
                <input autocomplete="off" id="unidadbase" name="unidadbase" type="text" class="form-control" tabindex="1"
                    placeholder="Ingrese la unidad base">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="" class="form-label">Nombre de la Unidad de Transaccion</label>
                <input autocomplete="off" id="unidadtransaccion" name="unidadtransaccion" type="text"
                    class="form-control" tabindex="2" placeholder="Ingrese la unidad de transaccion">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="" class="form-label">Multiplicador</label>
                <input autocomplete="off" id="multiplicador" name="multiplicador" type="number" class="form-control"
                    tabindex="3" placeholder="Ingrese el multiplicador">
            </div>
        </div>


        <a href="{{ route('admin.unidadmedidas.index') }}" class="btn btn-secondary" tabindex="2">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
