@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Informacion sobre el examen</h3>

        <hr class="text-slate-500 my-4 divide-x divide-inherit" />

        <div class="card w-1/2 bg-neutral text-neutral-content mx-auto p-4">

            <h3 class="font-bold text-center">Informacion</h3>

            <div class="card-body grid grid-cols-2 border gap-4 border-0">
                @forelse ($examenes as $examen)
                    <div>
                        <p class="my-5">Evaluador</p>
                        <p class="my-5">Fecha</p>
                        <p class="my-5">Hora</p>
                        <p class="my-5">Lugar</p>
                    </div>
                    <div>
                        <p class="my-5">{{$examen->docentenombre}} {{$examen->docenteapellido}}</p>
                        <p class="my-5">{{$examen->fecha}}</p>
                        <p class="my-5">{{$examen->hora}}</p>
                        <p class="my-5">{{$examen->lugar}}</p>
                    </div>
                @empty
                    <p>A un no se agrego Informacion sobre el examen</p>
                @endforelse
            </div>

        </div>

    </main>
@endsection
