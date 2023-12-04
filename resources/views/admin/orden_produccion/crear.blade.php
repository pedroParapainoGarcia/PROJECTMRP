@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h1>Crear Nuevo Lote</h1>
@stop

@section('content')
<form action="{{ route ('admin.lote.store')}}" method="POST">
  @csrf

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Codigo</label>
        <input autocomplete="off" id="codigo" name="codigo" type="text" class="form-control" tabindex="1"
          placeholder="Ingrese el codigo del lote">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Cantidad</label>
        <input autocomplete="off" id="cantidad" name="cantidad" type="text" class="form-control" tabindex="1"
          placeholder="Ingrese la cantidad del lote">
      </div>
    </div>

   
    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="id_cliente">Producto</label>
          <select required class="form-control" name="id_producto" id="id_producto">
              @foreach($Productos as $Producto)
              
              <option value="{{$Producto->id}}">{{$Producto->nombres}}</option>
              @endforeach
         </select>
      </div>
   </div>
   
  </div>
  
    <div class="col-xs-12 col-sm-12 col-md-6">
      <a href="{{ route('admin.lote.index')}}" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary ">Guardar</button>
    </div>

</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop