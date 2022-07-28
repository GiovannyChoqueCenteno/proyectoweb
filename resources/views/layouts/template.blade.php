<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>

<body class="bg-prymary flex flex-col justify-between h-screen antialiased leading-none font-sans">
    <div id="app">
        <header>
            <div class="navbar bg-base-100">

                <div class="navbar-start">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </label>
                    </div>



                </div>

                <div class="navbar-end">
                    <form action="{{route('pagina.index')}}" method="GET">
                    <div class="form-control">
                        <input type="text" placeholder="Search" name="titulo" class="input input-bordered" />
                    </div>
                </form>

                    <div class="dropdown dropdown-end mx-3">
                        <select class="select" data-choose-theme>
                            <option value="light">Claro</option>
                            <option value="dark">Oscuro</option>
                            <option value="retro">Adolescente</option>
                            <option value="synthwave">Niño</option>
                        </select>
                    </div>


                    <div class="dropdown dropdown-end">

                        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://placeimg.com/80/80/people" />
                            </div>
                        </label>

                        <ul tabindex="0"
                            class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                            
                            {{-- <li><a>Settings</a></li> --}}
                            {{-- <li><a h>Logout</a></li> --}}
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="p-0">
                                    @csrf
                                    <button class="text-start p-2 pl-4 w-full">Cerrar Sesion</button>
                                </form>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        </header>

        @if (Auth::check())
            @if (Auth::user()->getRol() == 'admin')
            @include('layouts.sidebar.sidebarA')
            @elseif(Auth::user()->getRol() == 'docente')
                @include('layouts.sidebar.sidebarD')
            @else
                @include('layouts.sidebar.sidebarE')
            @endif
        @endif
        @yield('content')
    </div>
    @if (!isset($pagina))
    
    @else
    <footer class="footer footer-center p-4 bg-base-300 text-base-content">
        <div>
            <h5> Total de vistas : {{$pagina->visitas}}</h5>
        </div>    
      </footer>
      @endif

      <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
</body>

</html>
