@extends('layouts.template')
@section('content')
    <main class="z-0 sm:container sm:mx-auto sm:mt-10 py-5">
        <h3 class="font-bold">Lista de Auxiliares</h3>
        <table class="z-0 table table-bordered table-compact mx-auto sm:w-full px-5 my-5">
            <thead>
                <tr>
                    <th>periodo</th>
                    <th>auxiliar</th>
                    <th>materia</th>
                    <th>grupo</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($auxiliares as $auxiliar)
                
                <tr>
                    <td>{{$auxiliar->pinicio}} {{$auxiliar->pfin}}</td>
                    <td>{{$auxiliar->nombre}} {{$auxiliar->apellido}}</td>
                    <td>{{$auxiliar->materia}}</td>
                    <td>{{$auxiliar->grupo}}</td>
                </tr>

                @empty
                <tr class="text-center">
                    <td colspan="3">
                        No hay ninguna auxiliar por el momento
                    </td>
                </tr>
                @endforelse
              
            </tbody>
        </table>
    </main>
@endsection
