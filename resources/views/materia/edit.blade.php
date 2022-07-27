@extends('layouts.template')

@section('content')

<main class="z-0 sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Editar Materia</h3>
    <form  action="{{route('materia.update', $materia->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-control bordered m-5">
            <label class="label" for="nombre">Nombre</label>
            <input type="text" value="{{$materia->nombre}}" id="nombre" name="nombre" placeholder="Nombre de la materia" class="input outline outline-1">
        </div>
        <div class="form-control bordered m-5">
            <label class="label" for="sigla">Sigla</label>
            <input type="text" value="{{$materia->sigla}}" id="sigla" name="sigla" placeholder="Sigla de la materia" class="input outline outline-1">
        </div>
        <div class="form-control bordered m-5">
            <label class="label" for="cargahoraria">Carga Horaria</label>
            <input type="number" value="{{$materia->cargahoraria}}" id="cargahoraria" name="cargahoraria" placeholder="Carga horaria de la materia" class="input outline outline-1">
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('materia.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
