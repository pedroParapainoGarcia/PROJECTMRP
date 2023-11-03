@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h1>Crear Nuevo Producto</h1>
@stop

@section('content')
<form action="{{ route ('admin.productos.store')}}" method="POST">
  @csrf

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Nombre</label>
        <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" tabindex="1"
          placeholder="Ingrese el nombre del producto">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Descripcion</label>
        <input autocomplete="off" id="descripcion" name="descripcion" type="text" class="form-control" tabindex="1"
          placeholder="Ingrese la descripcion del producto">
      </div>
    </div>

   
    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="id_cliente">Categoria</label>
          <select required class="form-control" name="id_categoria" id="id_categoria">
              @foreach($categorias as $categoria)
              
              <option value="{{$categoria->id}}">{{$categoria->nombres}}</option>
              @endforeach
         </select>
      </div>
   </div>
   
  </div>
  
    <div class="col-xs-12 col-sm-12 col-md-6">
      <a href="{{ route('admin.productos.index')}}" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary ">Guardar</button>
    </div>

</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop