@extends('layouts.template')

@section('content')

<main class="z-0 sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Registrar Convocatoria</h3>
    <form  action="{{route('usuario.store')}}" method="POST">
        @csrf
        <div class="form-control bordered m-5">
            <label class="label" for="codigo">Codigo</label>
            <input type="text" id="codigo" name="codigo" placeholder="Codigo de el usuario" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" for="descripcion">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del usuario" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido del usuario" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" >Email</label>
            <input type="text" id="email" name="email" placeholder="Email del usuario" class="input outline outline-1">

        </div>
        <div class="form-control m-5">
            <label class="label" >Rol del usuario</label>
            <select class="select" name="idrol">
                <option disabled selected>Seleccionar el rol del usuario</option>
                @foreach ($roles as $rol)
                <option value="{{$rol->id}}"> {{$rol->nombre}}</option>                    
                @endforeach
              </select>
        </div>
        
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('cronograma.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
