<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript" src="{{ asset('js/toastr.js') }}"></script>
    {{-- @vite('resources/css/app.css') --}}
    @livewireStyles
</head>

<body>
    <div class="container-fluid w-full relative bg-slate-100 p-0">
        <nav class="z-20 h-16 bg-blue-500 w-full fixed top-0 mb-5 sm:z-20 md:flex ">
            {{-- Menu --}}
            <div id="menu" class="hidden z-20 container-fluid bg-blue-500 rounded-md py-3 w-full absolute h-auto md:flex sm:justify-around">
                <h2 class="hidden sm:block w-[40%]  text-center text-2xl mt-1 text-white font-semibold">APP-TES</h2>
                <div class="list w-3/4 sm:flex">
                    <ul class=" border-spacing-2 py-1 px-1 w-full md:space-x-4 text-sm font-bold text-white md:text-black md:flex">
                        <li class=" hover:bg-slate-200 hover:text-blue-800 hover:shadow-md hover:shadow-slate-800 px-3 py-2 rounded-lg"><a href="{{ route('produk') }}">Produk</a></li>
                        <li class=" hover:bg-slate-200 hover:text-blue-800 hover:shadow-md hover:shadow-slate-800 px-3 py-2 rounded-lg"><a href="{{ route('kategori') }}">Kategori</a></li>
                    </ul>
                </div>

            </div>
            <h2 class="text-center text-2xl mt-1 text-white font-semibold">APP-TES</h2>
        </nav>
        {{-- Button Menu --}}
        <div id="toggle-menu" class=" md:hidden z-40 w-10 h-10 bg-white fixed top-1 right-1 flex-col px-2 py-2 rounded-md cursor-pointer ">
            <div class="border-b border-black border-2 my-1"></div>
            <div class="border-b border-black border-2 my-1"></div>
            <div class="border-b border-black border-2 my-1"></div>
        </div>


        <div class=" pt-14">
            @yield('konten')
        </div>
    </div>


    @livewireScripts
    <script type="text/javascript">
    document.addEventListener('livewire:init', (data) => {
            Livewire.on('showToastr', (data) => {
            showToastr(data.type, data.message);
            });
        });


        const toggleMenu = document.querySelector('#toggle-menu');
        const menu = document.querySelector('#menu');
        const btnTambah = document.querySelector('#tambah');
        const form = document.querySelector('#form');
        const btnClose = document.querySelector('#btn-close');

        // button menu in mobile screen
        toggleMenu.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });

        // button add in mobile screen
        if (btnTambah){
            btnTambah.addEventListener('click', function() {
                form.classList.toggle('hidden');
            });
        };

        // button close form
        btnClose.addEventListener('click', function() {
            form.classList.add('hidden');
        });


        </script>
</body>

</html>
