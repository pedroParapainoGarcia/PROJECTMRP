@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
<h1>Generar Reporte de Igresos de Articulos</h1>
@stop

@section('content')
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form action="{{ route ('admin.notaingreso.generar')}}" method="POST">
  @csrf

  <div class="mb-3">
    <label for="" class="form-label">Fecha Inicio</label>
    <input autocomplete="off" id="fechainicio" name="fechainicio" type="date" class="form-control" tabindex="2" placeholder="Ingrese la fecha de Inicio">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Fecha Fin</label>
    <input autocomplete="off" id="fechafin" name="fechafin" type="date" class="form-control" tabindex="3" placeholder="Ingrese la fecha de Fin">
  </div>

  <a href="{{ route('admin.notaingreso.index')}}" class="btn btn-secondary" tabindex="4">Volver</a>
  <button type="submit" class="btn btn-primary" tabindex="5">Generar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop