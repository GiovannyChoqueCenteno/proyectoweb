@extends('layouts.app')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Registrar Convocatoria</h3>
    <form  action="{{route('convocatoria.store')}}" method="POST">
        @csrf
        <div class="form-control bordered m-5">
            <label class="label" for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la convocatoria" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" for="descripcion">Descripcion</label>
            <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion de la convocatoria" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" placeholder="Fecha de convocatoria" class="input outline outline-1">
        </div>
        <div class="form-control m-5">
            <label class="label" >Tipo de Convocatoria</label>
            <select class="select" name="idtipoconvocatoria">
                <option disabled selected>Seleccionar el tipo de convocatoria</option>
                @foreach ($tipoconvocatorias as $tipoconvocatoria)
                <option value="{{$tipoconvocatoria->id}}"> {{$tipoconvocatoria->nombre}}</option>                    
                @endforeach
              </select>
        </div>
        <div class="form-control m-5">
            <label class="label" >Periodo</label>
            <select class="select" name="idperiodo">
                <option disabled selected>Seleccionar el periodo</option>
                @foreach ($periodos as $periodo)
                <option value="{{$periodo->id}}"> {{$periodo->inicio}} - {{$periodo->fin}}</option>                    
                @endforeach
              </select>
        </div>
        
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('convocatoria.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
