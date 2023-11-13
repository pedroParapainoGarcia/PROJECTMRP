@extends('adminlte::page')

@section('title', 'MRP')

@section('content_header')
    <h1>Todo tu negocio en una sola plataforma.</h1>
@stop

@section('content')
    <div class="conten">
        <p>Bienvenido</p>
        @include('parcial.livewire')
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
