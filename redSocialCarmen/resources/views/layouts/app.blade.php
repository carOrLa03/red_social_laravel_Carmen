<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        {{-- scripts --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-crimson shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" >
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>

            <footer class="footer bg-crimson">
                <div>
                    <ul class="nav_lista flex justify-center">
                        <li class="lista_item m-2"><a href="#" class="link"><img src="{{asset('images/icons/github.svg')}}" alt="Git Hub" class="link_logo"></a></li>
                        <li class="lista_item m-2"><a href="#" class="link"><img src="{{asset('images/icons/facebook.svg')}}" alt="Facebook" class="link_logo"></a></li>
                        <li class="lista_item m-2"><a href="#" class="link"><img src="{{asset('images/icons/instagram.svg')}}" alt="Instagram" class="link_logo"></a></li>
                        <li class="lista_item m-2"><a href="#" class="link"><img src="{{asset('images/icons/whatsapp.svg')}}" alt="Whatsapp" class="link_logo"></a></li>
                    </ul>
                </div>
                <div class="flex justify-center text-white">
                    <p class="text">by Carmen Ortiz</p>
                </div>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
