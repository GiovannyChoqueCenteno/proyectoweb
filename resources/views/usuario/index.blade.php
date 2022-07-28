@extends('layouts.template')

@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de usuarios</h3>
        <table class="z-0 table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Codigo de usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol de id</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($usuarios as $usuario)
                    <tr class="w-10">
                        <td>
                            {{ $usuario->codigo }}
                        </td>
                        <td>
                           {{$usuario->nombre}}

                        </td>
                        <td>
                            {{ $usuario->apellido }}
                        </td>
                        <td>
                            {{$usuario->email}}
                        </td>
                        <td>
                            {{$usuario->idrol}}
                        </td>
                        <td>
                            @if($usuario->idrol==1)
                            No permitido
                            @else
                            <a href="{{route('usuario.edit', $usuario->codigo)}}" class="btn btn-secondary">Editar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $usuarios->links('pagination::tailwind') }}

        <a href="{{ route('usuario.create') }}" for="my-modal-3" class="btn btn-primary modal-button">Registrar usuario</a>
        <!-- Put this part before </body> tag -->
    </main>
@endsection
