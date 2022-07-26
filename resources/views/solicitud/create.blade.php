@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Registrar periodo</h3>
    <form  action="{{route('solicitud.update')}}" method="POST">
        @csrf
        <div class="form-control bordered m-5">
            <label class="label" for="codigo">Codigo del Estudiante</label>
            <input type="text" value="{{$solicitud->codigo}}" id="codigo" name="codigo" placeholder="Codigo del estudiante" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" for="fin">Fin del Perido</label>
            <input type="text" id="fin" name="fin" placeholder="fin del periodo" class="input outline outline-1">
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('periodo.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
