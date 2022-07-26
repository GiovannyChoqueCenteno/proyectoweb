@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <h3 class="font-bold">Lista de Cronogramas</h3>

        <table class="table table-bordered table-compact mx-auto w-10/12 lg:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Id del Periodo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cronogramas as $cronograma)
                    <tr class="w-10">
                        <td>
                            {{ $cronograma->id }}
                        </td>
                        <td>
                            {{ $cronograma->fecha }}
                        </td>
                        <td>
                            {{ $cronograma->idperiodo }}

                        </td>
                        <td>
                            <a href="{{route('cronograma.show',$cronograma->id)}}" class="btn btn-secondary">Ver actividades</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
        <a href="{{ route('cronograma.create') }}" for="my-modal-3" class="btn btn-primary modal-button">Registrar
            cronograma</a>

        <!-- Put this part before </body> tag -->

    </main>
@endsection

@section('footer')
    <div>
        <h5> Total de vistas : {{$pagina->visitas}}</h5>
    </div>

@endsection