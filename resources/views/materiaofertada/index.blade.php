@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de materiaofertadas</h3>
        <table class="table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Id de la convocatoria</th>
                    <th>Fecha de la convocatoria</th>
                    <th>Acciones</th>
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
                            <a href="{{route('materiaofertada.edit',["idconvocatoria"=>$materiaofertada->idconvocatoria, "idmateria"=> $materiaofertada->idmateria])}}" class="btn btn-primary">Asignar Examen</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $materiaofertadas->links('pagination::tailwind') }}

        <!-- Put this part before </body> tag -->

    </main>
@endsection
