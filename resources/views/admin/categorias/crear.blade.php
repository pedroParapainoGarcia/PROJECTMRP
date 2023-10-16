@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h1>Crear Nueva Categoria</h1>
@stop

@section('content')
<form action="{{ route ('admin.categorias.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input autocomplete="off" id="nombres" name="nombres" type="text" class="form-control" tabindex="1" 
    placeholder="Ingrese el nombre de categoria">    
  </div>
  
  <a href="{{ route('admin.categorias.index')}}" class="btn btn-secondary" tabindex="2">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="3">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop