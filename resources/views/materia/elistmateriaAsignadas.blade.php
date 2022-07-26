@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de Materias Asignadas</h3>

        @if (session('info'))
            <div class="alert alert-success shadow-lg my-10">
                <div>
                    {{ session('info') }}
                </div>
            </div>
        @endif

        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>periodo</th>
                    <th>convocatoria</th>
                    <th>materia</th>
                    <th>informacion</th>
                    <th>estudiantes</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($materias as $materia)
                    <tr class="w-10">
                        <td>{{ $materia->pinicio }} {{ $materia->pfin }}</td>
                        <td>{{ $materia->convocatoria }}</td>
                        <td>{{ $materia->nombre }}</td>
                        <td>
                            <a href="{{ route('examen.add.info', [
                                'idmat' => $materia->id,
                                'idconv' => $materia->convocatoria,
                            ]) }}"
                                class="btn btn-primary bi bi-arrow-bar-right "></a>
                        </td>
                        <td>
                            <a href="{{ route('examen.aceptados', [
                                'idmat' => $materia->id,
                                'idconv' => $materia->convocatoria,
                            ]) }}"
                                class="btn btn-primary bi bi-arrow-bar-right "></a>
                        </td>
                    </tr>
                @empty
                    <tr class="w-10 text-center">
                        <td colspan="4">
                            No tiene materias asignadas
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </main>
@endsection
