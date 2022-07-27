@extends('layouts.template')

@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de periodos</h3>

        <table class="z-0 table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($periodos as $periodo)
                    <tr class="w-10">
                        <td>
                            {{ $periodo->id }}
                        </td>
                        <td>
                            {{ $periodo->inicio }}
                        </td>
                        <td>
                            {{ $periodo->fin }}


                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('periodo.create') }}" for="my-modal-3" class="btn btn-primary modal-button">Registrar Periodo</a>

        <!-- Put this part before </body> tag -->

    </main>


@endsection