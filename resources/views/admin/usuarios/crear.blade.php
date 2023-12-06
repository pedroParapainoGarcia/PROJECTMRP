@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
<h1>Alta de Usuarios</h1>
@stop

@section('content')

<form action="{{ route ('admin.usuarios.store')}}" method="POST">
    @csrf
  
    <div class="row">
  
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="" class="form-label">Nombre</label>
                <input autocomplete="off" id="name" name="name" type="text" class="form-control" 
                 placeholder="Ingrese el nombre del Rol ">
            </div>
        </div>
  
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="" class="form-label">Correo</label>
                <input autocomplete="off" id="email" name="email" type="text" class="form-control"
                    placeholder="Ingrese su correo">
            </div>
        </div>
  
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="password">Password</label>
                <input autocomplete="off" id="password" name="password" type="password" class="form-control" 
                placeholder="Ingrese su contraseña ">
                
                <small class="text-danger">
                
                </small>
                

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="password">Confirmar Password</label>
                <input autocomplete="off" id="password" name="password" type="password" class="form-control" 
                placeholder="Confirme su contraseña ">
                
                <small class="text-danger">
                   </small>
                

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