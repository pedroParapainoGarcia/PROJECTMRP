@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h1>Editar Lotes</h1>
@stop

@section('content')
<form action="{{ route ('admin.lote.update',$lote->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Lote</label>
        <input id="codigo" name="codigo" type="text" class="form-control" value="{{$lote->codigo}}">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="text" class="form-control" value="{{$lote->cantidad}}">
      </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-6">
      <label for="id_cliente">Producto</label>
      <select required class="form-control" name="id_producto" id="id_producto">
          @foreach($producto as $cat)
          
          <option value="{{$cat->id}}">{{$cat->nombres}}</option>
          @endforeach
      </select>
    </div>

  </div>
  <a href="{{ route('admin.lote.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop