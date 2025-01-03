<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles

    <title>{{ $title ?? 'Portfolio' }}</title>
</head>
<body class="bg-blue-primary-color font-quicksand overflow-x-hidden">
    <nav class="flex justify-around items-center w-screen px-8 py-2 bg-blue-secondary-color ">
        <img src="{{ asset('img/logo_dark.png') }}" alt="Logo" class="w-32">
        <ul class="flex space-x-16 text-white px-8 py-4 justify-center">
            <li><a href="{{route('home')}}">Accueil</a></li>

            <li><a href="{{ route('project.index') }}">Mes projets</a></li>

            <li><a href="#">Mes Passions</a></li>

            @auth
                <li>{{ Auth::user()->name }}</li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button>Deconnexion</button>
                    </form>
                </li>
            @endauth
        </ul>
        <div x-data="{ isHovered: false }" class="flex space-x-6 items-center">
            <div class=" relative w-fit overflow-hidden group bg-blue-fifth-color text-white px-6 py-2 flex justify-center items-center space-x-3"
                 @mouseenter="isHovered = true"
                 @mouseleave="isHovered = false"
            >
                <div
                    class="absolute inset-0 bg-white transform -translate-x-full transition-transform duration-500 group-hover:translate-x-0"
                ></div>
                <div class="relative z-10 font-bold text-white transition-colors duration-500 group-hover:text-black">
                    <a class="uppercase font-quicksand tracking-wider" href="">Contactez-moi</a>
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
    </nav>
    @if (session('status') || session('success'))
        <div class="ml-2 bg-blue-bg-primary-color">
            <p class="text-sm font-medium text-white">
                {{ session('status') ?? session('success') }}
            </p>
        </div>
    @endif
    <main class="">
        @if(auth()->user())
            <ul class="flex w-fit space-x-16 bg-blue-primary-color text-white rounded-full px-8 py-4 my-8">
                <li><a href="{{ route('project.index') }}">Mes projets</a></li>
                <li><a href="{{ route('language.index') }}">Les languages</a></li>
                <li><a href="{{ route('originLanguage.index') }}">Origines des languages</a></li>
            </ul>
        @else

        @endif
        {{$slot}}
    </main>
<footer class=" p-8 text-center">
    <p>&copy;2024 Inacio Rodrigues</p>
</footer>
    @livewireScripts

</body>
</html>
