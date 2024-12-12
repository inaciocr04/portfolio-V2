<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <title>{{ $title ?? 'Portfolio' }}</title>
</head>
<body class="bg-beige-primary-color">
    <nav class="flex justify-between items-center border-2 border-black w-screen">
        <img src="{{ asset('img/logo_dark.png') }}" alt="Logo" class="w-32">
        <ul class="flex space-x-16 bg-blue-primary-color text-white rounded-full px-8 py-4">
            <li><a href="{{route('home')}}">Accueil</a></li>

            <li><a href="#">Mes projets</a></li>

            <li><a href="#">Mes Passions</a></li>

            <li><a href="">Contact</a></li>
        </ul>
        <div class="flex space-x-6 items-center">
            <div class="border w-10 flex justify-center items-center p-2 h-10 border-black rounded-full size-6">
                <i class="bi bi-github text-2xl"></i>
            </div>
            <div class="border w-10 flex justify-center items-center p-2 h-10 border-black rounded-full size-6">
                <i class="bi bi-instagram text-2xl"></i>
            </div>
            <div class="border w-10 flex justify-center items-center p-2 h-10 border-black rounded-full size-6">
                <i class="bi bi-twitter-x text-2xl"></i>
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
    <main class="px-20">
        <ul class="flex w-fit space-x-16 bg-blue-primary-color text-white rounded-full px-8 py-4 my-8">
            <!--Faire en sorte que ca saffiche que une fois authentifier-->
            <li><a href="{{route('project.index')}}">Mes projets</a></li>

            <li><a href="{{route('language.index')}}">Les languages</a></li>
            <li><a href="{{route('originLanguage.index')}}">Origines des languages</a></li>
        </ul>
        {{$slot}}
    </main>
<footer class="bg-beige-fourth-color p-8 text-center">
    <p>&copy;2024 Inacio Rodrigues</p>
</footer>
</body>
</html>
