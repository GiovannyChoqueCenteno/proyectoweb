@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de actividades</h3>
    <div class="overflow-x-auto">

        <table class="table table-bordered table-compact mx-auto sm:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Id del cronograma</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($actividades as $actividad)
                    <tr  >
                        <td>
                            {{ $actividad->id }}
                        </td>
                        <td>
                            {{ $actividad->nombre }}
                        </td>
                        <td>
                            {{ $actividad->fecha }}

                        </td>
                        <td>
                            {{ $actividad->idcronograma }}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

        <a href="{{ route('actividad.create') }}" for="my-modal-3" class="btn btn-primary modal-button">Registrar
            actividad</a>

        <!-- Put this part before </body> tag -->

    </main>
@endsection
