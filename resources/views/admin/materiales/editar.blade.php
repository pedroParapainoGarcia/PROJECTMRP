@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h1>Editar Categorias</h1>
@stop

@section('content')
<form action="{{ route ('admin.materiales.update',$material->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">

     <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Material</label>
        <input id="nombre" name="nombre" type="text" class="form-control" value="{{$material->nombre}}">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$material->descripcion}}">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <label for="id_unidadmedida">Categoria</label>
      <select required class="form-control" name="id_unidadmedida" id="id_unidadmedida">
          @foreach($unidadmedida as $umedidad)
          
          <option value="{{$umedidad->id}}">{{$umedidad->unidadtransaccion}}</option>
          @endforeach
      </select>
    </div>  


    <div class="col-xs-12 col-sm-12 col-md-6">
      <label for="id_categoria">Categoria</label>
      <select required class="form-control" name="id_categoria" id="id_categoria">
          @foreach($categoria as $cat)
          
          <option value="{{$cat->id}}">{{$cat->nombres}}</option>
          @endforeach
      </select>
    </div>

  </div>
  <a href="{{ route('admin.materiales.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop