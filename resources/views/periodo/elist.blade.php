@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de periodos</h3>
        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5 ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Periodo</th>
                    <th>Convocatoria</th>
                    <th>Auxiliares</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($periodos as $periodo)
                    <tr class="w-10">
                        <td>
                            {{ $periodo->id }}
                        </td>
                        <td>
                            {{ $periodo->inicio }}-{{ $periodo->fin }}
                        </td>
                        <td>
                            <a href="{{ route('econvocatoria.list', [
                                'id' => $periodo->id,
                            ]) }}"
                             class="btn btn-primary bi bi-arrow-bar-right"></a>
                        </td>

                        <td>
                            <a href="{{ route('eauxiliar.listar', [
                                'idperiodo' => $periodo->id,
                            ]) }}"
                             class="btn btn-primary bi bi-arrow-bar-right"></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>

    </main>
@endsection
