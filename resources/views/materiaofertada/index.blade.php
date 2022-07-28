@extends('layouts.template')

@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de Materias Ofertadas</h3>
        <table class="z-0 table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Id de la convocatoria</th>
                    <th>Fecha de la convocatoria</th>
                    <th>Estado del examen</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($materiaofertadas as $materiaofertada)
                    <tr class="w-10">
                        <td>
                         {{ $materiaofertada->idmateria }}
                        </td>
                        <td>
                            {{ $materiaofertada->nombre }}
                        </td>
                       
                        <td>
                            {{ $materiaofertada->idconvocatoria }}

                        </td>
                        <td>
                            {{$materiaofertada->fecha}}
                        </td>
                        <td>
                            @if ($materiaofertada->asignado)
                                Ya asignado
                            @else
                            <a href="{{route('materiaofertada.edit',["idconvocatoria"=>$materiaofertada->idconvocatoria, "idmateria"=> $materiaofertada->idmateria])}}" class="btn btn-primary">Asignar Evaluador</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $materiaofertadas->links('pagination::tailwind') }}

        <!-- Put this part before </body> tag -->

    </main>
@endsection
