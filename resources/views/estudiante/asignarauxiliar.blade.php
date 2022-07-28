@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10 pb-5">
        <h3 class="font-bold">Agregar Auxiliar</h3>
        <hr class="text-slate-500 my-4 divide-x divide-inherit" />

        @if (session('info'))
            <div class="alert alert-success shadow-lg">
                <div>
                    {{ session('info') }}
                </div>
            </div>
        @endif

        <div class="card w-1/2 bg-base-200 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="card-title">Agregar Auxiliar</h2>
                <form method="POST" action="{{ route('save.asignacion.auxiliar') }}">
                    <input type="hidden" name="codigod" value="{{ $codigod }}" />
                    <input type="hidden" name="idmateria" value="{{ $idmateria }}" />
                    <input type="hidden" name="idgrupo" value="{{ $idgrupo }}" />
                    @csrf
                    <div class="my-1">
                        <label class="label">
                            <span class="label-text">codigo auxiliar</span>
                        </label>
                        <input type="text" name="codigoa" class="input w-full" value="" required />
                    </div>

                    <div class="my-1">
                        <label class="label">
                            <span class="label-text">Periodo</span>
                        </label>
                        <select name="idperiodo" class="select w-full max-w-xs">
                            @foreach ($periodos as $periodo)
                                <option value="{{ $periodo->id }}">{{ $periodo->inicio }} {{ $periodo->fin }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-primary">agregar</button>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
