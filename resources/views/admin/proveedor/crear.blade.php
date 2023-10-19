@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h1>Crear Nuevo Proveedor</h1>
@stop

@section('content')
<form action="{{ route ('admin.proveedor.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" tabindex="1" 
    placeholder="Ingrese el nombre del Proveedor">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input autocomplete="off" id="email" name="email" type="text" class="form-control" tabindex="2" 
    placeholder="Ingrese direccion de email">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Direccion</label>
    <input autocomplete="off" id="direccion" name="direccion" type="text" class="form-control" tabindex="3" 
    placeholder="Ingrese la direccion del proveedor">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Pais</label>
    <input autocomplete="off" id="pais" name="pais" type="text" class="form-control" tabindex="4" 
    placeholder="Ingrese el pais del proveedor">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono</label>
    <input autocomplete="off" id="telefono" name="telefono" type="text" class="form-control" tabindex="1" 
    placeholder="Ingrese el telefono">    
  </div>
  <a href="{{ route('admin.proveedor.index')}}" class="btn btn-secondary" tabindex="2">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop