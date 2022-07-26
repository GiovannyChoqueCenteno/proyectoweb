@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de Convocatorias</h3>
    <div class="overflow-x-auto">

        <table class="table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($convocatorias as $convocatoria)
                    <tr  >
                        <td>
                            {{ $convocatoria->id }}
                        </td>
                        <td>
                            {{ $convocatoria->titulo }}
                        </td>
                        <td>
                            {{ $convocatoria->descripcion }}

                        </td>
                        <td>
                            {{ $convocatoria->fecha }}
                        </td>
                        <td>
                            <a href="{{route('convocatoria.show',$convocatoria->id)}}" class="btn btn-secondary">Ver Solicitudes</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

        <a href="{{ route('convocatoria.create') }}" for="my-modal-3" class="btn btn-primary modal-button">Registrar
            convocatoria</a>

        <!-- Put this part before </body> tag -->

    </main>
@endsection
