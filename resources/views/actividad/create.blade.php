@extends('layouts.template')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Registrar Actividad</h3>
    <form  action="{{route('actividad.store')}}" method="POST">
        @csrf
        <div class="form-control bordered m-5">
            <label class="label" for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre de la actividad" class="input outline outline-1">
            @error('nombre')
            <br />
            <small class="text-red-600">{{ $message }}</small>
        @enderror
        </div>
      
        <div class="form-control m-5">
            <label class="label" for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" placeholder="Fecha de actividad" class="input outline outline-1">
            @error('fecha')
            <br />
            <small class="text-red-600">{{ $message }}</small>
        @enderror
        </div>
     
        <div class="form-control m-5">
            <label class="label" >Cronograma</label>
            <select class="select" name="idcronograma">
                <option disabled selected>Seleccionar el cronograma</option>
                @foreach ($cronogramas as $cronograma)
                <option value="{{$cronograma->id}}"> {{$cronograma->fecha}}</option>                    
                @endforeach
              </select>
              @error('idcronograma')
              <br />
              <small class="text-red-600">{{ $message }}</small>
          @enderror
        </div>
        
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('actividad.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
