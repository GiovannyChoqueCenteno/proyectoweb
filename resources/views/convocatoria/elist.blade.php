@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de convocatorias</h3>
        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>titulo</th>
                    <th>fecha</th>
                    <th>Materias ofertadas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($convocatorias as $convocatoria)
                    <tr class="w-10">
                        <td>
                            {{ $convocatoria->id }}
                        </td>
                        <td>
                            {{ $convocatoria->titulo }}
                        </td>
                        <td>
                            {{ $convocatoria->fecha }}
                        </td>
                        <td>
                            <a href="{{ route('emateria.list', [
                                'id' => $convocatoria->id,
                            ]) }}"
                                class="btn btn-primary bi bi-arrow-bar-right "></a>
                        </td>
                    </tr>
                @empty
                    <tr class="w-10 text-center">
                        <td colspan="3">
                            No existen convocatorias en este periodo
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </main>
@endsection
