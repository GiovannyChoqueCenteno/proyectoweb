@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Asignar Examen</h3>
    <form  action="{{route('examen.store')}}" method="POST">
        @csrf
        
        <div class="form-control bordered m-5">
            <label class="label" for="idmateria">Id de materia</label>
            <input type="text" readonly value="{{$materiaofertada->idmateria}}" id="idmateria" name="idmateria" placeholder="Id de la materia" class="input outline outline-1">
        </div>
        <div class="form-control bordered m-5">
            <label class="label" for="idconvocatoria">Id de convocatoria</label>
            <input type="text" readonly value="{{$materiaofertada->idconvocatoria}}" id="idconvocatoria" name="idconvocatoria" placeholder="Id de la convocatoria" class="input outline outline-1">
        </div>
        <div class="form-control bordered m-5">
            <label class="label" for="fecha">Fecha del examen</label>
            <input type="date"  id="fecha" name="fecha" placeholder="Fecha del examen" class="input outline outline-1">
        </div>
        <div class="form-control bordered m-5">
            <label class="label" for="hora">Hora del examen</label>
            <input type="time"  id="hora" name="hora" placeholder="Hora del examen" class="input outline outline-1">
        </div>
        <div class="form-control bordered m-5">
            <label for="lugar" class="label">Lugar</label>
            <input class="input outline outline-1" type="text" id="lugar" name="lugar" placeholder="Lugar de examen">
        </div>
        <div class="form-control bordered m-5">
            <label for="codigo" class="label">Docente</label>
            <select class="select" name="codigo">
                <option disabled selected>Seleccionar el docente</option>
                @foreach ($docentes as $docente)
                <option value="{{$docente->codigo}}"> {{$docente->nombre}}</option>                    
                @endforeach
              </select>
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('materiaofertada.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
