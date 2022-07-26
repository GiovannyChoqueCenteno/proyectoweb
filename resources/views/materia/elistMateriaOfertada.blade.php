@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de Materias Ofertadas</h3>
        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>sigla</th>
                    <th>evaluador</th>
                    <th>solicitud</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($materias as $materia)
                    <tr class="w-10">
                        <td>
                            {{ $materia->id }}
                        </td>
                        <td>
                            {{ $materia->nombre }}
                        </td>
                        <td>
                            {{ $materia->sigla }}
                        </td>
                        <td>
                            {{ $materia->docenten }} {{ $materia->docentea }}
                        </td>
                        <td>
                            <a href="{{ route('esolicitud.form', [
                                'idmat' => $materia->id,
                                'idconv' => $materia->idconv,
                            ])}}"
                                class="btn btn-primary bi bi-arrow-bar-right "></a>
                        </td>
                    </tr>
                @empty
                    <tr class="w-10 text-center">
                        <td colspan="3">
                            No existen materias ofertadas en esta convocatoria
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </main>
@endsection
