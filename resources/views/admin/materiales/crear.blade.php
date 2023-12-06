@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
<h1>Crear Nuevo Lote</h1>
@stop

@section('content')
<form action="{{ route ('admin.materiales.store')}}" method="POST">
  @csrf

  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Nombre</label>
        <input autocomplete="off" id="nombre" name="nombre" type="text" class="form-control" tabindex="1"
          placeholder="Ingrese el nombre del material">
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="" class="form-label">Descripcion</label>
        <input autocomplete="off" id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2"
          placeholder="Ingrese la descripcion del material">
      </div>
    </div>

   
    <div class="col-xs-12 col-sm-12 col-md-6">
      <div class="form-group">
        <label for="id_unidadmedida">Unidad de Medidas</label>
          <select required class="form-control" name="id_unidadmedida" id="id_unidadmedida">
              @foreach($unidadmedida as $umedida)
              
              <option value="{{$umedida->id}}">{{$umedida->unidadtransaccion}}</option>
              @endforeach
         </select>
      </div>
   </div>

      <div class="col-xs-12 col-sm-12 col-md-6">
              <div class="form-group">
                <label for="id_categoria">Categoria</label>
                  <select required class="form-control" name="id_categoria" id="id_categoria">
                      @foreach($categoria as $cat)
                      
                      <option value="{{$cat->id}}">{{$cat->nombres}}</option>
                      @endforeach
                </select>
              </div>
      </div>

   
   
  </div>
  
    <div class="col-xs-12 col-sm-12 col-md-6">
      <a href="{{ route('admin.materiales.index')}}" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-primary ">Guardar</button>
    </div>

</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop