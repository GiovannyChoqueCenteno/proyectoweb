@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10 pb-5">
        <h3 class="font-bold">Agregar informacion sobre el examen</h3>
        <hr class="text-slate-500 my-4 divide-x divide-inherit" />

        <div class="card w-1/2 bg-base-200 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="card-title">Informacion</h2>

                @if (session('info'))
                    <div class="alert alert-success shadow-lg">
                        <div>
                            {{ session('info') }}
                        </div>
                    </div>
                @endif

                @if (is_null($examen))
                    <div class="text-center">
                        <span>Aun no se creo el examen</span>
                    </div>
                @else
                    <form method="POST" action="{{ route('examen.update.info') }}">
                        <input type="hidden" name="idmateria" value="{{ $idmateria }}" />
                        <input type="hidden" name="idconvocatoria" value="{{ $idconvocatoria }}" />
                        @csrf
                        <div class="my-1">
                            <label class="label">
                                <span class="label-text">Fecha</span>
                            </label>
                            <input type="date" name="fecha" class="input w-full" value="{{ $examen->fecha }}"
                                required />
                        </div>

                        <div class="my-1">
                            <label class="label">
                                <span class="label-text">hora</span>
                            </label>
                            <input type="time" name="hora" class="input w-full" value="{{ $examen->hora }}"
                                required />
                        </div>

                        <div class="my-1">
                            <label class="label">
                                <span class="label-text">lugar</span>
                            </label>
                            <input type="text" name="lugar" class="input w-full" value="{{ $examen->lugar }}"
                                minlength="6" maxlength="6" required />
                        </div>

                        <div class="my-4">
                            <button class="btn btn-primary">Actualizar</button>
                        </div>

                    </form>
                @endif

            </div>
        </div>

    </main>
@endsection
