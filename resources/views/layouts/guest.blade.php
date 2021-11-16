<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

      
    </head>
    <body class="bg-dark font-sans antialiased">
        <header>
            <nav class="navbar navbar-dark bg-dark-normal">
                <div class="container-fluid">
                  <a class="navbar-brand">Sonoda Informatica</a>
                  <form >
                    <a class="btn btn-success color-light mx-2 text-light" href="{{ route('route.person.create') }}">
                        Criar Pessoa
                    </a>
                    <a class="btn btn-success light mx-2 text-light" href="{{ route('login') }}">
                        Logar Pessoa
                    </a>
                  </form>
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        </body>
</html>