@extends('layouts.template')

@section('content')

<main class="z-0 sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Editar Usuario</h3>
    <form  action="{{route('usuario.update' , $usuario->codigo)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-control bordered m-5">
            <label class="label" for="codigo">Codigo</label>
            <input type="text" readonly value="{{$usuario->codigo}}" id="codigo" name="codigo" placeholder="Codigo de el usuario" class="input outline outline-1">
            @error('codigo')
                    <br />
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-control m-5">
            <label class="label" for="descripcion">Nombre</label>
            <input type="text" value="{{$usuario->nombre}}" id="nombre" name="nombre" placeholder="Nombre del usuario" class="input outline outline-1">
            @error('nombre')
                    <br />
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-control m-5">
            <label class="label" for="apellido">Apellido</label>
            <input type="text" value="{{$usuario->apellido}}" id="apellido" name="apellido" placeholder="Apellido del usuario" class="input outline outline-1">
            @error('apellido')
                    <br />
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-control m-5">
            <label class="label" >Email</label>
            <input type="text" value="{{$usuario->email}}" id="email" name="email" placeholder="Email del usuario" class="input outline outline-1">
            @error('email')
            <br />
            <small class="text-red-600">{{ $message }}</small>
        @enderror
        </div>
        <div class="form-control m-5">
            <label class="label" >Contraseña</label>
            <input type="password" id="pass" name="pass" placeholder="Contraseña del usuario" class="input outline outline-1">
            @error('pass')
            <br />
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-control m-5">
            <label class="label"for="">Id Rol</label>
            <input type="text" class="input outline outline-1" name="idrol" value="{{$usuario->idrol}}" readonly>
        </div>
        
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('usuario.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
