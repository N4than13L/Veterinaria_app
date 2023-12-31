<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="dns-prefetch" href="//fonts.bunny.net">

    {{-- fonts awasome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> Veterinaria los codornises </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css', 'resources/js/arriba.js'])


</head>

<body class="mb-0 mt-0">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm fixed-top" style="background-color: #6eafa0;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h4> Veterinaria Los Codornises </h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::user())
                        <ul class="navbar-nav ">
                            <a class="fw-normal btn" href="{{ url('/home') }}"><i class="fa-solid fa-house"></i>
                                Inicio</a>
                            <a class="fw-normal btn" href="{{ route('client.index') }}"> <i
                                    class="fa-solid fa-user"></i> Clientes</a>
                            <a class="fw-normal btn" href="{{ route('vaccine.index') }}"> <i
                                    class="fa-solid fa-syringe"></i> Vacunas</a>
                            <a class="fw-normal btn" href="{{ route('animals.index') }}"> <i
                                    class="fa-solid fa-paw"></i>Mascotas</a>
                            <a class="fw-normal btn" href="{{ route('species.index') }}"><i class="fa-solid fa-dog"></i>
                                Especies</a>
                            <a class="fw-normal btn" href="{{ route('treatment.index') }}"><i
                                    class="fa-solid fa-notes-medical"></i> Tratamientos</a>
                            <a class="fw-normal btn" href="{{ route('bill.index') }}"><i
                                    class="fa-solid fa-file-invoice-dollar"></i>
                                Factura</a>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name . ' ' . Auth::user()->surname }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    {{-- settings --}}
                                    <a class="dropdown-item" href="{{ route('settings') }}">
                                        <i class="fa-solid fa-gear"></i> Configuración de perfil
                                    </a>

                                    {{-- cambiar contrasena --}}
                                    <a class="dropdown-item" href="{{ route('user.change', ['id' => $user->id]) }}"> <i
                                            class="fa-solid fa-pen-to-square"></i> Cambiar contraseña
                                    </a>

                                    {{-- logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="fa-solid fa-right-from-bracket"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="position-relative">
        <div class="position-absolute bottom-0 end-0 m-3">
            <button type="button" id="up" class="btn btn-success p-3">
                <i class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
    </div>

    <footer class="mb-0 mt-3" style="bottom: 0px;">
        {{-- footer --}}
        @extends('layouts.footer')
    </footer>

</body>

</html>
