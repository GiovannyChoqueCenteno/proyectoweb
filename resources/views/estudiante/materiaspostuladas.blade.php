@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de Materias Postulada</h3>

        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Periodo</th>
                    <th>Convocatoria</th>
                    <th>Materia</th>
                    <th>Solicitud</th>
                    <th>Nota Acumulada</th>
                    <th>Nota Final</th>
                    <th>Detalle</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($materias as $materia)
                    <tr>
                        <td>{{ $materia->pinicio }}{{ $materia->pfin }}</td>
                        <td>{{ $materia->convocatoria }}</td>
                        <td>{{ $materia->nombre }}</td>
                        @if (is_null($materia->aceptado))
                            <td>espera</td>
                        @elseif($materia->aceptado)
                            <td>aceptado</td>
                        @else
                            <td>rechazado</td>
                        @endif

                        <td>{{ $materia->notaacumulada }}</td>

                        <td>{{ $materia->notafinal }}</td>

                        <td>
                            <a href="{{ route('eexamen.detalle', [
                                'idmat' => $materia->id,
                                'idconv' => $materia->convocatoria,
                            ]) }}"
                                class="btn">Detalle</a>
                        </td>
                        <td>
                            <a href="{{ route('eexamen.nota', [
                                'idmat' => $materia->id,
                                'idconv' => $materia->convocatoria,
                            ]) }}"
                                class="btn btn-active btn-primary">Notas</a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">
                            No postulantes a ninguna materia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
@endsection
