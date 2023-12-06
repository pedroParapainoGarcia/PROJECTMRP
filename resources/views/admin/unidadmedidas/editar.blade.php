@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Editar  UnidadMedida</h1>
@stop

@section('content')
   <form action="{{ route ('admin.unidadmedidas.update',$unidadmedida->id)}}" method="POST">      
   @csrf
   @method('PUT')
 
  <div class="mb-3">
    <label for="" class="form-label">Nombre UnidadBase</label>
    <input autocomplete="off"  id="unidadbase" name="unidadbase" type="text" class="form-control" value="{{$unidadmedida->unidadbase}}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Nombre Unidad de Transaccion</label>
    <input autocomplete="off"  id="unidadtransaccion" name="unidadtransaccion" type="text" class="form-control" value="{{$unidadmedida->unidadtransaccion}}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Multiplicador </label>
    <input autocomplete="off"  id="multiplicador" name="multiplicador" type="number" class="form-control" value="{{$unidadmedida->multiplicador}}">
  </div>
  
  <a href="{{ route('admin.unidadmedidas.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop