@extends('layouts.template')

@section('content')

<main class="sm:container sm:mx-auto sm:mt-10">
    <h3 class="text-lg font-bold">Registrar Cronograma</h3>
    <form  action="{{route('cronograma.store')}}" method="POST">
        @csrf
        
        <div class="form-control m-5">
            <label class="label" for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" placeholder="Fecha de convocatoria" class="input outline outline-1">
            @error('fecha')
            <br />
            <small class="text-red-600">{{ $message }}</small>
        @enderror
        </div>

        <div class="form-control m-5">
            <label class="label" >Periodo</label>
            <select class="select" name="idperiodo">
                <option disabled selected>Seleccionar el periodo</option>
                @foreach ($periodos as $periodo)
                <option value="{{$periodo->id}}"> {{$periodo->inicio}} - {{$periodo->fin}}</option>                    
                @endforeach
              </select>
              @error('idperiodo')
              <br />
              <small class="text-red-600">{{ $message }}</small>
              @enderror
        </div>
        
        <button class="btn btn-primary" type="submit">Guardar</button>
        <a href="{{route('cronograma.index')}}" class="btn btn-warning">Volver a la lista</a>
    </form>
</main>
@endsection
