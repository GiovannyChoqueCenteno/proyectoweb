@extends('layouts.app')

@section('content')
    <main class="sm:container  sm:mx-auto sm:mt-10">
     @foreach ($paginas as $pagina)
     <div class="card w-96 bg-primary text-primary-content mb-5">
        <div class="card-body">
          <h2 class="card-title">{{$pagina->titulo}}</h2>
          <p>{{$pagina->descripcion}}</p>
          <div class="card-actions justify-end">
            <a href="{{route($pagina->ruta)}}" class="btn btn-secondary">Ir </a>
          </div>
        </div>
      </div>
     @endforeach

        <!-- Put this part before </body> tag -->

    </main>

@endsection


{{-- @section('footer')
    <div>
        <h5> Total de vistas : {{$pagina->visitas}}</h5>
    </div>

@endsection --}}