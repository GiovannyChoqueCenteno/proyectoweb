@extends('layouts.template')

@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de actividades</h3>

        <table class="z-0 table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($actividades as $actividad)
                    <tr class="w-10">
                        <td>
                            {{ $actividad->id }}
                        </td>
                        <td>
                            {{ $actividad->nombre }}
                        </td>
                        <td>
                            {{ $actividad->fecha }}

                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{route('cronograma.index')}}" class="btn btn-warning">Volver a la lista</a>

        <!-- Put this part before </body> tag -->

    </main>
@endsection
