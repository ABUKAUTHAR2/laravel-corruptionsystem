<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description"
        content="Welcome to the Digital Club of KIUT. Explore our events, workshops, and activities in the field of Information and Communication Technology.">
    <meta name="keywords"
        content="Digital Club,TCRA DIGITAL CLUBS,KAMPALA INTERNATIONAL UNIVERSITY IN TANZANIA, KIUT, ICT Club, Workshops, Events, Technology, ICT, Kampala University Club">
    <title>corruption online</title>

    <title>kiu-dclub</title>
    <style>
        .nav-icon {
            padding: 15px;
            text-align: center;
            font-size: 30px;
        }

        .nav-icon i {
            display: block;
        }

        .nav a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        i {
            text-decoration: none
        }

        .nav a:hover {
            background-color: #34495e;
            color: white;
        }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <!-- Resources are now in the public directory -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <!-- Add this in the <head> section of your app.blade.php -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])



</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: rgb(67, 128, 7)">
                    TAKUKURU 2023
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">

                </button>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Other links -->

                        </li>

                        @auth
                            @if (Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users') }}">Club mebers</a>

                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <!-- User profile dropdown -->
                            </li>
                        @endauth
                        <!-- Auth links -->
                    </ul>

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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a href="{{ route('welcome') }}" style="text-decoration: none"><i
                                            class="nav-icon fa fa-home"></i style="text-decoration: none;"> Home</a><br>
                                    <a href="{{ route('profile') }}" style="text-decoration: none"><i
                                            class="nav-icon fa fa-user-circle"></i> Profile</a><br>
                                    <a style="text-decoration: none"><i class="nav-icon fa fa-user-circle"></i>
                                        Events</a><br>
                                    <a href="{{ route('register') }}" style="text-decoration: none"><i
                                            class="nav-icon fa fa-cog"></i> Settings</a><br>
                                    <a style="text-decoration: none"><i class="nav-icon fa fa-bell"></i> Post
                                        message</a><br>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        style="color: red">
                                        <i class="nav-icon fa fa-sign-out" style="color: red"></i> Logout</a>
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
    <div style="text-align: center; margin-top: 20px; color: #888;">
        &copy; Digital Club of KIUT 2023. All rights reserved.
    </div>
    <!-- resources/views/layouts/app.blade.php -->
    <!-- Your other HTML content here -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
