@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10 pb-5">
        <h3 class="font-bold">Creacion Auxiliar</h3>
        <hr class="text-slate-500 my-4 divide-x divide-inherit" />
        @if (session('info'))
            <div class="alert alert-success shadow-lg">
                <div>
                    {{ session('info') }}
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('save.auxiliar') }}">
            @csrf
            <div class="my-1">
                <label class="label">
                    <span class="label-text">Estudiante</span>
                </label>
                <select name="codigoe" class="select w-full">
                    @foreach ($estudiantes as $estudiante)
                        <option value="{{ $estudiante->codigo }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-5">
                <button class="btn btn-primary">agregar</button>
            </div>
        </form>
    </main>
@endsection
