<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/styles.css">
       <!-- bootstrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body >
        <div class="container mt-5">

            <header>
                <nav>
                    <ul class="header">
                            <li>
                                <a href="/">Home</a> 
                            </li>
                            <li>
                                <a href="/events/create">Criar evento</a>   
                            </li>
                            @auth
                            <li>
                                <a href="/dashboard">Meus eventos</a> 
                            </li>
                            <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">Sair </a>
                            </form>
                            @endauth
                            @guest
                            <li>
                                <a href="/login">Login</a> 
                            </li>
                            <li>
                                <a href="/register">Cadastre-se</a>  
                            </li>

                            @endguest
                    </ul>
                </nav>    
            </header>


            @yield('content')


            <footer>HDC Events &copy; 2024</footer>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
