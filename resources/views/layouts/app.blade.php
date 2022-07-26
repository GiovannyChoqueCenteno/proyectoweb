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
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

<body class="bg-prymary flex flex-col h-screen antialiased justify-between leading-none font-sans">
    <div id="app">
        <header>
            <div class="navbar bg-base-100">
                <div class="navbar-start">
                    <div class="dropdown">
                    <label tabindex="0" class="btn btn-ghost lg:hidden">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                    </label>
                    {{-- <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                      <li><a>Item 1</a></li>
                      <li tabindex="0">
                        <a class="justify-between">
                          Parent
                          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
                        </a>
                        <ul class="p-2">
                          <li><a>Submenu 1</a></li>
                          <li><a>Submenu 2</a></li>
                        </ul>
                      </li>
                      <li><a>Item 3</a></li>
                    </ul> --}}
                  </div>
                  <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
                </div>
                <div class="navbar-center hidden lg:flex">
                  <ul class="menu menu-horizontal p-0">
                    <li tabindex="0">
                        <a>
                          Cronograma
                          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                        </a>
                        <ul class="p-2">
                          <li><a href="{{route('periodo.index')}}" >Periodo</a></li>
                          <li><a href="{{route('convocatoria.index')}}">Convocatoria</a></li>
                          <li><a href="{{route('cronograma.index')}}">Cronograma</a></li>
                        </ul>
                      </li>
                    <li tabindex="0">
                      <a>
                        Parent
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                      </a>
                      <ul class="p-2">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                      </ul>
                    </li>
                    <li><a>Item 3</a></li>
                  </ul>
                </div>
                <div class="navbar-end">
                  <form action="{{route('pagina.index')}}" method="GET">
                    <div class="form-control">
                        <input type="text" placeholder="Search" name="titulo" class="input input-bordered" />
                    </div>
                </form>
                    <div class="dropdown dropdown-end">
                  
                        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                          <div class="w-10 rounded-full">
                            <img src="https://placeimg.com/80/80/people" />
                          </div>
                        </label>
                        <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                          <li>
                            <a class="justify-between">
                              Profile
                              <span class="badge">New</span>
                            </a>
                          </li>
                          <li><a>Settings</a></li>
                          <li><a>Logout</a></li>
                        </ul>
                      </div>
                </div>
              </div>
            {{-- <div class="navbar">
                <div class="flex-1">
                  <a class="btn btn-ghost normal-case text-xl">Auxialiares</a>
                </div>
                
                <div class="flex-none gap-2">
                  <div class="form-control">
                    <input type="text" placeholder="Search" class="input input-bordered" />
                  </div>
                 <div class="">
                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a>Item 1</a></li>
                        <li tabindex="0">
                          <a class="justify-between">
                            Parent
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
                          </a>
                          <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                          </ul>
                        </li>
                        <li><a>Item 3</a></li>
                      </ul>
                 </div>
                  <div class="dropdown dropdown-end">
                  
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                      <div class="w-10 rounded-full">
                        <img src="https://placeimg.com/80/80/people" />
                      </div>
                    </label>
                    <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                      <li>
                        <a class="justify-between">
                          Profile
                          <span class="badge">New</span>
                        </a>
                      </li>
                      <li><a>Settings</a></li>
                      <li><a>Logout</a></li>
                    </ul>
                  </div>
                </div>
              </div> --}}
{{-- 
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                    <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else
                    <span>{{ Auth::user()->name }}</span>
               
                    <a href="{{ route('logout') }}" class="no-underline hover:underline" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    @endguest

                    <input type="text">
                </nav>
            </div> --}}

        </header>
        <select class="select" data-choose-theme>
            <option value="light">Default</option>
            <option value="dark">Dark</option>
            <option value="retro">Retro</option>
        </select>

        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
    <footer class="footer footer-center p-4 bg-base-300 text-base-content">
      @yield('footer')
    </footer>

  </body>
  
</html>