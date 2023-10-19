@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Editar  Proveedores</h1>
@stop

@section('content')
<form action="{{ route ('admin.proveedor.update',$proveedor->id)}}" method="POST">      
   @csrf
   @method('PUT')
 
  <div class="mb-3">
    <label for="" class="form-label">Nombre Proveedor</label>
    <input autocomplete="off"  id="nombre" name="nombre" type="text" class="form-control" value="{{$proveedor->nombre}}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input autocomplete="off"  id="email" name="email" type="text" class="form-control" value="{{$proveedor->email}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Direccion</label>
    <input autocomplete="off"  id="direccion" name="direccion" type="text" class="form-control" value="{{$proveedor->direccion}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Pais</label>
    <input autocomplete="off"  id="pais" name="pais" type="text" class="form-control" value="{{$proveedor->pais}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono</label>
    <input autocomplete="off"  id="telefono" name="telefono" type="text" class="form-control" value="{{$proveedor->telefono}}">
  </div>
  
  <a href="{{ route('admin.proveedor.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop