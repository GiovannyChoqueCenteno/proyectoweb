@extends('layouts.template')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <h3 class="text-lg font-bold">Registrar periodo</h3>
        <form id="form" action="{{ route('periodo.store') }}" method="POST">
            @csrf
            <div class="form-control bordered m-5">
                <label class="label" for="inicio">Inicio del Perido</label>
                <input type="text" id="inicio" name="inicio" placeholder="Inicio del periodo"
                    class="input outline outline-1">
                @error('inicio')
                    <br />
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-control m-5">
                <label class="label" for="fin">Fin del Perido</label>
                <input type="text" id="fin" name="fin" placeholder="fin del periodo"
                    class="input outline outline-1">
                @error('fin')
                    <br />
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Guardar</button>
            <a href="{{ route('periodo.index') }}" class="btn btn-warning">Volver a la lista</a>
        </form>
    </main>
@endsection
