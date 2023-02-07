<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Red social</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

</head>
<body class="bg-gris">
@section('header')
<header class="bg-crimson">
    <nav class="flex justify-between">
        <div class="caja_logo m-6">
            <img src="{{asset('images/icons/logo.png')}}" alt="logo" class="logo">
        </div>
        <div>
            <ul class="nav_lista flex m-6">
                <li class="lista_item m-2"><a href="/" class="link">Home</a></li>
                <li class="lista_item m-2"><a href="{{ route('register') }}" class="link">Register</a></li>
                @guest
                <li class="lista_item m-2"><a href="{{ route('login') }}" class="link">Log In</a></li>
                @endguest
                @auth
                    <li class="lista_item m-2"><a href="{{ route('dashboard') }}" class="link">Dashboard</a></li>
                @endauth
            </ul>
        </div>

    </nav>
    <div class="flex justify-center">
        <h1 class="title text-xl m-4">Red Social</h1>
    </div>
</header>
@show
@yield('content')
<footer class="footer bg-crimson flex flex-col">
    <div class="justify-center items-center">
        <ul class="nav_lista flex justify-content-around m-2">
            <li class="lista_item m-2"><a href="#" class="link"><img src="{{asset('images/icons/github.svg')}}" alt="Git Hub" class="link_logo"></a></li>
            <li class="lista_item m-2"><a href="#" class="link"><img src="{{asset('images/icons/facebook.svg')}}" alt="Facebook" class="link_logo"></a></li>
            <li class="lista_item m-2"><a href="#" class="link"><img src="{{asset('images/icons/instagram.svg')}}" alt="Instagram" class="link_logo"></a></li>
            <li class="lista_item m-2"><a href="#" class="link"><img src="{{asset('images/icons/whatsapp.svg')}}" alt="Whatsapp" class="link_logo"></a></li>
        </ul>
    </div>
    <div class="items-center">
        <p class="text-white">by Carmen Ortiz 2023</p>
    </div>
</footer>

</body>
</html>
