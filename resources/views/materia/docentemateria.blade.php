@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">

        <h3 class="font-bold">Lista docente Materia</h3>

        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>docente</th>
                    <th>materia</th>
                    <th>grupo</th>
                    <th>auxiliar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($docentesmaterias as $dm)
                    <tr class="w-10">
                        <td>{{ $dm->nombre }} {{ $dm->apellido }}</td>
                        <td>{{ $dm->materia }}</td>
                        <td>{{ $dm->grupo }}</td>
                        <td>
                            <a
                                href="{{ route('asignar.auxiliar', [
                                    'idmat' => $dm->idmateria,
                                    'idgrup' => $dm->idgrupo,
                                    'codigod' => $dm->codigo,
                                ]) }}"class="btn btn-primary bi bi-arrow-bar-right "></a>
                        </td>
                    </tr>
                @empty
                    <tr class="w-10 text-center">
                        <td colspan="4">
                            No tiene creados docentes con materias
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </main>
@endsection
