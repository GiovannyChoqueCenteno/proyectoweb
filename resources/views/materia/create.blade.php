@extends('layouts.template')

@section('content')

<main class="z-0 sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Registrar Materia</h3>
    <form  action="{{route('materia.store')}}" method="POST">
        @csrf
        <div class="form-control bordered m-5">
            <label class="label" for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre de la materia" class="input outline outline-1">
        </div>
        <div class="form-control bordered m-5">
            <label class="label" for="sigla">Sigla</label>
            <input type="text" id="sigla" name="sigla" placeholder="Sigla de la materia" class="input outline outline-1">
        </div>
        <div class="form-control bordered m-5">
            <label class="label" for="cargahoraria">Carga Horaria</label>
            <input type="number" id="cargahoraria" name="cargahoraria" placeholder="Carga horaria de la materia" class="input outline outline-1">
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('cronograma.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
