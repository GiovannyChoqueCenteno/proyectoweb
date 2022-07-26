    <aside>
        <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
            <i class="bi bi-filter-left px-2 bg-neutral rounded-md"></i>
        </span>

        <div
            class="z-10 sidebar fixed top-0 bottom-0 2xl:left-0 left-[-300px] duration-1000
        p-2 w-[300px] overflow-y-auto text-center bg-neutral shadow h-screen">

            <div class="text-gray-100 text-xl">

                <div class="p-2.5 mt-1 flex  justify-between rounded-md text-start">
                    <h1 class="text-[15px]  ml-3 text-xl text-gray-200 font-bold">Usuario: Estudiante</h1>
                    <i class="d-block bi bi-x ml-20 cursor-pointer 2xl:hidden " onclick="Openbar()"></i>
                </div>

                <hr class="my-2 text-gray-600">

                <div>

                    <div
                        class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-primary">
                        <i class="bi bi-house-door-fill"></i>
                        <a href="/estudiante"><span class="text-[15px] ml-4 text-gray-200">Home</span></a>
                    </div>

                    <hr class="my-4 text-gray-600">

                    <div
                        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-primary">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <a href="/emateriaspostuladas"><span class="text-[15px] ml-4 text-gray-200">Materias Postuladas</span></a>
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
