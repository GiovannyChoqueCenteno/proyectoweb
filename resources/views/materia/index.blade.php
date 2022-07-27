@extends('layouts.template')

@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de materias</h3>
        <table class="z-0 table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Sigla</th>
                    <th>Carga Horaria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($materias as $materia)
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
                            {{$materia->cargahoraria}}
                        </td>
                        <td>
                            <a href="{{route('materia.edit' , $materia->id)}}" class="btn btn-secondary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $materias->links('pagination::tailwind') }}
        <a href="{{ route('materia.create') }}" for="my-modal-3" class="btn btn-primary modal-button">Registrar materia</a>

        <!-- Put this part before </body> tag -->

    </main>
@endsection
