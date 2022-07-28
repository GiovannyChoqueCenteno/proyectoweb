@extends('layouts.template')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Registrar Grupo</h3>
    <form  action="{{route('grupo.store')}}" method="POST">
        @csrf
        <div class="form-control bordered m-5">
            <label class="label" for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="nombre del grupo" class="input outline outline-1">
        </div>
        
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('grupo.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
