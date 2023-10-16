@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Editar  Categorias</h1>
@stop

@section('content')
   <form action="{{ route ('admin.categorias.update',$categorias->id)}}" method="POST">      
   @csrf
   @method('PUT')
 
  <div class="mb-3">
    <label for="" class="form-label">Nombre Categoria</label>
    <input autocomplete="off"  id="nombres" name="nombres" type="text" class="form-control" value="{{$categorias->nombres}}">
  </div>
  
  <a href="{{ route('admin.categorias.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop