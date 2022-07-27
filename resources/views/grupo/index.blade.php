@extends('layouts.template')

@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de grupos</h3>

        <table class="z-0 table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grupos as $grupo)
                    <tr class="w-10">
                        <td>
                            {{ $grupo->id }}
                        </td>
                        <td>
                            {{ $grupo->nombre }}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('grupo.create') }}" for="my-modal-3" class="btn btn-primary modal-button">Registrar
            grupo</a>

        <!-- Put this part before </body> tag -->

    </main>
@endsection
