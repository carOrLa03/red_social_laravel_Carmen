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
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>
<body>
@section('header')
<header>
    <nav class="nav">
        <div class="caja_logo">
            <img src="{{asset('images/icons/logo.png')}}" alt="logo" class="logo">
        </div>
        <div>
            <ul class="nav_lista">
                <li class="lista_item"><a href="/" class="link">Home</a></li>
                <li class="lista_item"><a href="login" class="link">Log In</a></li>
                <li class="lista_item"><a href="#" class="link">Red</a></li>
            </ul>
        </div>

    </nav>
</header>
@show
@yield('content')
@section('footer')
<footer class="footer">
    <div>
        <ul class="nav_lista">
            <li class="lista_item"><a href="#" class="link"><img src="{{asset('images/icons/github.png')}}" alt="Git Hub" class="link_logo"></a></li>
            <li class="lista_item"><a href="#" class="link"><img src="{{asset('images/icons/facebook.png')}}" alt="Facebook" class="link_logo"></a></li>
            <li class="lista_item"><a href="#" class="link"><img src="{{asset('images/icons/instagram.png')}}" alt="Instagram" class="link_logo"></a></li>
            <li class="lista_item"><a href="#" class="link"><img src="{{asset('images/icons/whatsapp.png')}}" alt="Whatsapp" class="link_logo"></a></li>
        </ul>
    </div>
    <div>
        <p class="text">by Carmen Ortiz</p>
    </div>

</footer>
@show

</body>
</html>
