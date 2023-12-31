@extends('adminlte::page')

@section('title', 'Editar datos de Usuarios')

@section('content_header')
<h1>Editar datos de Usuario</h1>
@stop

@section('content')

<form action="{{ route ('admin.usuarios.store')}}" method="POST">
    @csrf
  
    <div class="row">
  
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="" class="form-label">Nombre</label>
                <input autocomplete="off" id="name" name="name" type="text" class="form-control" value="{{$user->name}}">
                
            </div>
        </div>
  
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
            <label for="" class="form-label">Correo</label>
            <input autocomplete="off" id="email" name="email" type="text" class="form-control"
            value="{{$user->email}}">
        </div>
        </div>

  
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <input autocomplete="off" id="password" name="password" type="password" class="form-control" 
                value="{{$user->password}}">             
                               
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="password">Confirmar Password</label>
                <input autocomplete="off" id="password" name="password" type="password" class="form-control" 
                value="{{$user->password}}">             
                              
            </div>
        </div>
   
            
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
            <label for="id_cliente">Rol</label>
            <select required class="form-control" name="id" id="id">
                @foreach($roles as $role)
                
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
          </div>
        </div>

     
    </div>
    <a href="{{ route('admin.usuarios.index')}}" class="btn btn-secondary" tabindex="3">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
 
</form>
@stop
     @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    @stop 