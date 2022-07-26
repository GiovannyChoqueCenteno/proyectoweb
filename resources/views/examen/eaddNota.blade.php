@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10 pb-5">

        <h3 class="font-bold">Agregar Nota Estudiante</h3>
        <hr class="text-slate-500 my-4 divide-x divide-inherit" />

        <div class="card w-1/2 bg-base-200 shadow-xl mx-auto">
            <div class="card-body">

                <h2 class="card-title">Nota</h2>

                @php
                    $notac = 0;
                    $notap = 0;
                    $notat = 0;
                    $route="examen.create.nota";
                @endphp

                @if ($createnota)
                    <div class="text-center">
                        <span>Aun no se agrego nota para el estudiante</span>
                    </div>
                @else
                    @php
                        $notac = $nota->notaconocimiento;
                        $notap = $nota->notapedagogica;
                        $notat = $notac + $notap;
                        $route="examen.update.nota";
                    @endphp
                @endif

                <form method="POST" action="{{ route($route) }}">

                    <input type="hidden" name="idmateria" value="{{ $nota->idmateria }}" />
                    <input type="hidden" name="idconvocatoria" value="{{ $nota->idconvocatoria }}" />
                    <input type="hidden" name="codigoestudiante" value="{{ $nota->codigoestudiante }}" />

                    @csrf
                    <div class="my-1">
                        <label class="label">
                            <span class="label-text">Nota Conocimiento</span>
                        </label>
                        <input type="number" max="40" min="0" name="notac" class="input w-full" required
                            value="{{ $notac }}" />
                    </div>

                    <div class="my-1">
                        <label class="label">
                            <span class="label-text">Nota Pedagogica</span>
                        </label>
                        <input type="number" max="40" min="0" name="notap" class="input w-full" required
                            value="{{ $notap }}" />
                    </div>

                    <div class="my-1">
                        <label class="label">
                            <span class="label-text">Nota Total</span>
                        </label>
                        <input type="number" name="notat" class="input w-full" readonly value="{{ $notat }}" />
                    </div>

                    <div class="my-4">
                        <button class="btn btn-primary">
                            {{ $createnota ? 'Crear' : 'Actualizar' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </main>
@endsection
