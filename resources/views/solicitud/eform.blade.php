@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Formulario Solicitud</h3>
        <hr class="text-slate-500 my-4 divide-x divide-inherit" />

        <div class="card w-1/2 bg-base-200 shadow-xl mx-auto">
            <div class="card-body">

                <h2 class="card-title">Solicitud</h2>

                @if (session('info'))
                    <div class="alert alert-success shadow-lg">
                        <div>
                            {{ session('info') }}
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('esolicitud.save') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idmateria" value="{{ $idmateria }}" />
                    <input type="hidden" name="idconvocatoria" value="{{ $idconvocatoria }}" />

                    <div class="my-4">
                        <label class="label">
                            <span class="label-text">Codigo</span>
                        </label>
                        <input type="text" placeholder="Type here" value={{ Auth::user()->codigo }} class="input w-full"
                            readonly />
                    </div>

                    <div class="my-4">
                        <label class="label">
                            <span class="label-text">Curriculum Vitae</span>
                        </label>
                        <input type="file" name="cv" class="input w-full" />
                        @error('cv')
                            <div class=" my-2 text-red-500">
                                <div>
                                    <span>{{ $message }}</span>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="my-4">
                        <button class="btn btn-primary">Enviar</button>
                    </div>

                </form>
            </div>
        </div>

    </main>
@endsection
