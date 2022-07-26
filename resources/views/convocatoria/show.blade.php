@extends('layouts.template')

@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de solicitudes</h3>

        @if (session('info'))
            <div class="alert alert-success shadow-lg my-5">
                <div>
                    {{ session('info') }}
                </div>
            </div>
        @endif

        <table class="z-0 table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Codigo de estudiante</th>
                    <th>Materia</th>
                    <th>Estado</th>
                    <th>Nota Acumulada</th>
                    <th>Nota Final</th>
                    <th>Acciones</th>
                    <th>CV</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($solicitudes as $solicitud)
                    <tr class="w-10">

                        <td>
                            {{ $solicitud->codigo }}
                        </td>
                        <td>
                            {{ $solicitud->nombre }}
                        </td>
                        <td>
                            @if (is_null($solicitud->aceptado))
                                No revisado
                            @elseif($solicitud->aceptado == 1)
                                Aceptado
                            @else
                                Rechazado
                            @endif
                        </td>
                        <td>
                            {{ $solicitud->notaacumulada }}
                        </td>
                        <td>
                            {{ $solicitud->notafinal }}
                        </td>
                        <td>
                            <a href="{{ route('solicitud.form.resp', [
                                'codigoe' => $solicitud->codigo,
                                'idmat' => $solicitud->idmateria,
                                'idconv' => $solicitud->idconvocatoria,
                            ]) }}"
                                class="btn btn-secondary">Editar</a>
                        </td>
                        <td>
                            @if (!is_null($solicitud->filecv) && $solicitud->filecv != '')
                                <a href="{{ asset('/storage/' . $solicitud->filecv) }}"
                                    class="btn btn-secondary">{{ $solicitud->filecv }}</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $solicitudes->links() }}
        <a href="{{ route('convocatoria.index') }}" class="btn btn-warning">Volver a la lista</a>

        <!-- Put this part before </body> tag -->

    </main>
@endsection
