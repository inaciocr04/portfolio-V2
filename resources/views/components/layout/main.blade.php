<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <title>{{ $title ?? 'Portfolio' }}</title>
</head>
<body class="bg-blue-primary-color font-quicksand overflow-x-hidden min-h-screen">
<nav class="fixed top-0 left-0 w-full z-50 flex justify-around items-center px-8 py-2 bg-blue-third-color shadow-md">
    <img src="{{ asset('img/logo_dark.png') }}" alt="Logo" class="w-14">
    <ul class="flex space-x-16 text-white px-8 py-4 justify-center">
        <li><a href="{{ route('home') }}">Accueil</a></li>
        <li><a href="{{ route('project.index') }}">Mes projets</a></li>
        <li><a href="#">Mes Passions</a></li>

        @auth
            <li>{{ Auth::user()->name }}</li>
            <li x-data="{ open: false }" class="relative">
                <span @click="open = !open" class="cursor-pointer">Partie admin</span>
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="absolute left-0 mt-2 bg-blue-fifth-color text-white rounded-lg shadow-lg w-56">
                    <ul class="space-y-2 py-2 px-4">
                        <li><a href="{{ route('project.index') }}">Mes projets</a></li>
                        <li><a href="{{ route('language.index') }}" class="block">Les langages</a></li>
                        <li><a href="{{ route('originLanguage.index') }}" class="block">Origines des langages</a></li>
                        <li><a href="{{ route('languageType.index') }}" class="block">Types de langages</a></li>
                        <li><a href="{{ route('timeline.index') }}" class="block">Timeline</a></li>
                    </ul>
                </div>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button>Deconnexion</button>
                </form>
            </li>
        @endauth
    </ul>
    <div x-data="{ isHovered: false }" class="flex space-x-6 items-center">
        <div
            class=" relative w-fit overflow-hidden group bg-blue-fifth-color text-white px-6 py-2 flex justify-center items-center space-x-3"
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
<main class="{{ $class ?? '' }}">
    {{$slot}}
</main>
<footer class=" p-8 text-center bg-blue-secondary-color">
    <p>&copy;2024 Inacio Rodrigues</p>
</footer>
@livewireScripts

</body>
</html>
