@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Registrar periodo</h3>
    <form  action="{{route('solicitud.update',['codigo' => $solicitud->codigo , 'idmateria' => $solicitud->idmateria,'idconvocatoria'=>$solicitud->idconvocatoria])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-control bordered m-5">
            <label class="label" for="codigo">Codigo del estudiante</label>
            <input type="text" id="codigo" readonly name="codigo" placeholder="Codigo del estudiante" value="{{$solicitud->codigo}}" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" for="idmateria">Id de la materia</label>
            <input type="text" id="idmateria" readonly value="{{$solicitud->idmateria}}" name="idmateria" placeholder="Id de la materia" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" >Estado</label>
            <select class="select" name="aceptado">
                <option disabled selected>Seleccionar el estado</option>
                <option value="0"> Rechazado</option>
                <option value="1">Aceptado</option>
              </select>
        </div>
         <div class="form-control m-5">
            <label class="label" for="notaacumulada">Nota acumulada</label>
            <input type="number" required id="notaacumulada"  value="{{$solicitud->notaacumulada}}" name="notaacumulada" placeholder="Id de la materia" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" for="notafinal">Nota final</label>
            <input type="number" required id="notafinal"  value="{{$solicitud->notafinal}}" name="notafinal" placeholder="Id de la materia" class="input outline outline-1">
        </div>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('solicitud.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
