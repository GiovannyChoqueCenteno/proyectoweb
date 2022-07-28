    <aside>

        <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
            <i class="bi bi-filter-left px-2 bg-neutral rounded-md"></i>
        </span>

        <div
            class="z-10 sidebar fixed top-0 bottom-0  left-[-300px] duration-1000
        p-2 w-[300px] overflow-y-auto text-center bg-neutral shadow h-screen">

            <div class=" text-xl">

                <div class="p-2.5 mt-1 flex  justify-between rounded-md text-start">
                    <h1 class="text-[15px]  ml-3 text-xl  font-bold">Usuario: Admin</h1>
                    <i class="d-block bi bi-x ml-20 cursor-pointer  " onclick="Openbar()"></i>
                </div>

                <hr class="my-2 ">

                <div class="flex justify-start">

                    <div class="dropdown">
                        <i class="bi bi-calendar"></i>
                        <label tabindex="0" class="btn m-1">Gestionar Usuarios
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="dropdown-content menu p-2 right-0 shadow bg-base-100 rounded-box w-full">
                            <li><a href="{{ route('usuario.index') }}"> Usuarios</a></li>

                        </ul>
                    </div>

                </div>
                <div class="flex justify-start">

                    <div class="dropdown">
                        <i class="bi bi-calendar"></i>
                        <label tabindex="0" class="btn m-1">Convocatoria General
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="dropdown-content menu p-2 right-0 shadow bg-base-100 rounded-box w-full">
                            <li><a href="{{ route('periodo.index') }}"> Periodo</a></li>
                            <li><a href="{{ route('cronograma.index') }}">Cronogramas</a></li>
                            <li><a href="{{ route('convocatoria.index') }}">Convocatorias</a></li>
                            <li><a href="{{ route('actividad.index') }}">Actividades</a></li>

                        </ul>
                    </div>

                </div>
                <div class="flex justify-start ">
                    <div class="dropdown">
                        <i class="bi bi-calendar"></i>
                        <label tabindex="0" class="btn m-1">Materia General
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="dropdown-content menu p-2 right-0 shadow bg-base-100 rounded-box w-full">
                            <li><a href="{{ route('grupo.index') }}">Grupos</a></li>
                            <li><a href="{{ route('materia.index') }}">Materias</a></li>
                            <li><a href="{{ route('materiaofertada.index') }}">Ofertadas</a></li>
                        </ul>
                    </div>
                    <hr class="my-4 text-gray-600">

                </div>

                <div class="flex justify-start">

                    <div class="dropdown">
                        <i class="bi bi-calendar"></i>
                        <label tabindex="0" class="btn m-1">Visitas
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="dropdown-content menu p-2 right-0 shadow bg-base-100 rounded-box w-full">
                            <li><a href="{{ route('graph.visitas') }}">Grafico paginas</a></li>
                        </ul>
                    </div>

                </div>

                <div class="flex justify-start">

                    <div class="dropdown">
                        <i class="bi bi-calendar"></i>
                        <label tabindex="0" class="btn m-1">Auxiliar
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </label>
                        <ul tabindex="0"
                            class="dropdown-content menu p-2 right-0 shadow bg-base-100 rounded-box w-full">
                            <li><a href="{{ route('materia.docente') }}">Agregar</a></li>
                            <li><a href="{{ route('auxiliares') }}">Auxiliares</a></li>
                        </ul>
                    </div>

                </div>

            </div>


        </div>
    </aside>

    <script>
        function dropDown() {
            document.querySelector('#submenu').classList.toggle('hidden')
            document.querySelector('#arrow').classList.toggle('rotate-0')
        }

        function Openbar() {
            document.querySelector('.sidebar').classList.toggle('left-[-300px]')
        }
        dropDown()
    </script>
