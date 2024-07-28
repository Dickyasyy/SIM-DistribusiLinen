{{-- <h1>Homepage</h1> 
<br>
<a href="/login" class="btn btn-primary">Login</a> --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Linen</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .full-width-image {
            position: relative;
            width: 100%;
            height: auto;
            opacity: 0.5; /* Transparansi */
        }

        body, html {
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* Menghilangkan scroll horizontal */
        }

        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        footer {
            flex-shrink: 0;
        }

        .full-width-image-container {
            width: 100%;
            overflow: hidden; /* Menghilangkan scroll */
        }

        .full-width-image img {
            width: 100%;
            max-height: 100vh; /* Membatasi tinggi gambar ke tinggi viewport */
            object-fit: cover; /* Membuat gambar menyesuaikan dengan ukuran kontainer */
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-title {
            text-align: center;
            font-size: 1.25rem;
            font-weight: bold;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="navbar-brand">
                    <img src="{{ url('/images/rspetro.jpeg') }}" class="img-fluid" width="50" height="50" alt="Image"/>
                </div>
                <div class="navbar-title">
                    Sistem Informasi Manajemen Linen
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nama }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
        <footer>
            <div class="full-width-image-container">
                <div class="full-width-image">
                    <img src="{{ url('/images/RumahSakit.jpeg') }}" class="img-fluid" alt="Full Width Image">
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
