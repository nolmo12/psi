<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="Content-Language" content="pl"/>
        <meta name="Author" content="Paweł Bąk"/>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <title>Sznycer-Fy</title>
    </head>
    <body>
        <div id="container">
            <div id="main">
                <nav>
                    <ul>
                    <li><a href="dashboard" class="active">Strona Główna</a></li>
                    <li><a href="games">Gry</a></li>
                    <li><a href="teams">Drużyny</a></li>
                    <li><a href="players">Gracze</a></li>
                    </ul>
                <main>
                    {{-- VIEW --}}
                    @yield('content')
                </main>
                <footer>
                    Autor: Paweł Bąk: 164343  &copy;
                </footer>
            </div>
        </div>

    </body>
</html>