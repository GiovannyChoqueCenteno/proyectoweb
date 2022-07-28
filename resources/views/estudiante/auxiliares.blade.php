@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10 py-5">
        <h3 class="font-bold">Lista de Auxiliares</h3>

        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5">
            <thead>
                <tr>
                    <th>codigo</th>
                    <th>nombre</th>
                    <th>apellido</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($auxiliares as $auxiliar)
                    <tr>
                        <td>{{ $auxiliar->codigo }}</td>
                        <td>{{ $auxiliar->nombre }}</td>
                        <td>{{ $auxiliar->apellido }}</td>
                    </tr>

                @empty
                    <tr class="text-center">
                        <td colspan="3">
                            No hay ninguna auxiliar por el momento
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <a href="{{ route('create.auxiliar') }}" for="my-modal-3" class="btn btn-primary modal-button">Registrar Auxiliar</a>
    </main>
@endsection
