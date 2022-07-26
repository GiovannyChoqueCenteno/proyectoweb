@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Notas de la materia</h3>
        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Docente</th>
                    <th>Nota Conocimiento</th>
                    <th>Nota Pedagogica</th>
                    <th>Nota final</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notas as $nota)
                    <tr>
                        <td>{{ $nota->docentenombre }} {{ $nota->docenteapellido }}</td>
                        <td>{{ $nota->notaconocimiento }}</td>
                        <td>{{ $nota->notapedagogica }}</td>
                        <td>{{ $nota->notafinal }}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4">
                            No hay ninguna nota por el momento
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
@endsection
