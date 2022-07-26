@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de solicitudes</h3>

        <table class="table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Codigo de estudiante</th>
                    <th>Materia</th>
                    <th>Estado</th>
                    <th>Nota Acumulada</th>
                    <th>Nota Final</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($solicitudes as $solicitud)
                    <tr class="w-10">
                        <td>
                            {{ $solicitud->codigo }}
                        </td>
                        <td>
                            {{$solicitud->nombre}}
                        </td>
                        <td>
                            @if (is_null($solicitud->aceptado))
                                No revisado
                            @elseif($solicitud->aceptado==1)
                                Aceptado
                            @else
                                Rechazado
                            @endif

                        </td>
                        <td>
                            {{ $solicitud->notaacumulada }}
                        </td>
                        <td>
                            {{$solicitud->notafinal}}
                        </td>
                        <td>
                            <a href="{{route('solicitud.edit', ['codigo' => $solicitud->codigo , 'idmateria' => $solicitud->idmateria,'idconvocatoria'=>$solicitud->idconvocatoria])}}" class="btn btn-secondary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{$solicitudes->links()}}

        <!-- Put this part before </body> tag -->

    </main>
@endsection
