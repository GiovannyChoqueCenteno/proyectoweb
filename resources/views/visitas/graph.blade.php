@extends('layouts.template')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>
    <main class="sm:container sm:mx-auto sm:mt-10  mb-10">
        <h3 class="text-lg font-bold text-center">Graficos de visitas</h3>
        <div style="width: 500px; margin: 0 auto;">
            <canvas id="graph"></canvas>
        </div>
    </main>
    <script src="{{ asset('/js/graph.js') }}"></script>
    <script>
        let titulos = <?= $titulos ?>;
        let visitas = <?= $visitas ?>;
        creategraph(visitas, titulos);
    </script>
@endsection
