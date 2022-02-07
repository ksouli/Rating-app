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

    <!-- Fonts 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    -->
    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <title>HOMEPAGE</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    .rating {
        position: relative;
        width: 180px;
        background: transparent;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: .3em;
        padding: 5px;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 0 2px #b3acac;
    }

    .rating__result {
        position: absolute;
        top: 0;
        left: 0;
        transform: translateY(-10px) translateX(-5px);
        z-index: -9;
        font: 3em Arial, Helvetica, sans-serif;
        color: #ebebeb8e;
        pointer-events: none;
    }

    .rating__star {
        font-size: 1.3em;
        cursor: pointer;
        color: #dabd18b2;
        transition: filter linear .3s;
    }

    .rating__star:hover {
        filter: drop-shadow(1px 1px 4px gold);
    }




    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 80%;
    }

    td,
    th {
        border: 1px solid #979595;
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #fcfcfc;
    }

    div {
        margin: auto;
        text-align: center;
    }

</style>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/mainpage') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        @if (Auth::check())


                            <li class="nav-item">


                                <form id="search-form" class="form-inline" action="/search" , method="GET">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search" name="q">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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

                            <li class="nav-item">
                                <a class="nav-link" href="/userprofile/{{ Auth::user()->id }}" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    My profile: {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </a>
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
</body>

</html>
