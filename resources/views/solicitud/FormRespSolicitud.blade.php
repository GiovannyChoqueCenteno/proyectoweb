@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">

        <h3 class="font-bold">Formulario Solicitud</h3>
        <hr class="text-slate-500 my-4 divide-x divide-inherit" />

        <div class="card w-1/2 bg-base-200 shadow-xl mx-auto">
            <div class="card-body">
                <h2 class="card-title">Solicitud</h2>
                @if (!is_null($solicitud))
                    <form method="POST" action="{{ route('solicitud.form.update') }}">
                        <input type="hidden" name="codigoe" value="{{ $solicitud->codigo }}" />
                        <input type="hidden" name="idmateria" value="{{ $solicitud->idmateria }}" />
                        <input type="hidden" name="idconvocatoria" value="{{ $solicitud->idconvocatoria }}" />
                        @csrf
                        <div class="my-4">
                            <label class="label">
                                <span class="label-text">Nota Antiguedad/Acumulada</span>
                            </label>
                            <input type="number" min="0" max="20" name="notaacumulada"
                                placeholder="nota acumulada..." class="input input-bordered w-full"
                                value="{{ $solicitud->notaacumulada }}" required />
                        </div>
                        <div class="my-4">
                            <label class="label">
                                <span class="label-text">Estado</span>
                            </label>
                            <select name="estado" class="select w-full">

                                <option {{ is_null($solicitud->aceptado) ? 'selected' : '' }} value="-1">Espera
                                </option>

                                <option {{ $solicitud->aceptado == 1 ? 'selected' : '' }} value="1">Aceptado
                                </option>

                                <option {{ !is_null($solicitud->aceptado) && $solicitud->aceptado == 0 ? 'selected' : '' }}
                                    value="0">Rechazado
                                </option>

                            </select>
                        </div>
                        <div class="my-4">
                            <button class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                @else
                    <p class="text-center">
                        <span>No se encontro la solicitud!!!</span>
                    </p>
                @endif

            </div>
        </div>

    </main>
@endsection
