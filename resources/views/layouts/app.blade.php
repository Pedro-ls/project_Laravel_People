<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body class="body-color">
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark-normal">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('home') }}">Sonoda Informatica</a>
                    <button class="navbar-toggler hidden-lg-up" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        @auth
                           
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('route.person.list') }}">Listar Pessoas <span
                                            class="visually-hidden">(current)</span></a>
                                </li>
                         
                        @endauth
                    </ul>
                        <div class="d-flex my-2 my-lg-0">
                            @guest
                            <div class="col-md-12">
                                <div class="d-flex">
                                    @if (Route::has('login'))
                                    <a class="btn btn-success light mx-2 text-light" href="{{ route('login') }}">
                                        Logar Pessoa
                                    </a>
                                    @endif

                                    @if (Route::has('register'))
                                    <a class="btn btn-success color-light mx-2 text-light"
                                        href="{{ route('register') }}">
                                        Criar Pessoa
                                    </a>
                                    @endif

                                </div>
                            </div>
                            @else

                            <div class="d-flex text-light">
                                <div>
                                    @yield("buttons")
                                </div>
                                <div class="text-light px-2 py-2">
                                    <a class="text-light" href="{{ route('person.account') }}">
                                        perfil de {{ explode(" ", Auth::user()->fullname)[0] }}
                                    </a>
                                </div>
                                <form class="m-0 p-0" action="{{ route('person.logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success px-2 py-2" type="submit">Logout</button>
                                </form>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="py-4 bg-dark">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>

</html>