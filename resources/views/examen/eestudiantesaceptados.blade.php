@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10 py-5">
        <h3 class="font-bold">Estudiantes Aceptados</h3>
        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5">
            <thead>
                <tr>
                    <th>codigo</th>
                    <th>estudiante</th>
                    <th>notafinal</th>
                    <th>editar</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->codigo }} </td>
                        <td>{{ $solicitud->estudiantenombre }} {{ $solicitud->estudianteapellido }}</td>
                        <td>{{ $solicitud->notafinal }}</td>
                        <td>
                            <a href="{{ route('examen.add.nota', [
                                'idmat' => $solicitud->idmateria,
                                'idconv' => $solicitud->idconvocatoria,
                                'codigoe' => $solicitud->codigo,
                            ]) }}"
                                class="btn btn-primary bi bi-arrow-bar-right "></a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">
                            No hay ninguna estudiante aceptado
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </main>
@endsection
