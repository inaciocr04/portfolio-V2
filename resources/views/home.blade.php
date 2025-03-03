<x-layout.main>
    <header class="flex justify-around items-center bg-blue-secondary-color">
        <div class="space-y-5">
            <div>
                <div class="flex items-center space-x-3">
                    <div class="w-20 h-1 bg-blue-fifth-color rounded">
                    </div>
                    <p class="font-quicksand text-2xl text-blue-fifth-color">
                        <span class="font-bold ">Bonjour, </span>
                        <span>je m'appelle </span></p>
                </div>
                <h1 class="text-8xl font-quicksand text-center w-fit pl-20">
                    <span>Inácio</span>
                    <span>Rodrigues</span>
                </h1>
                <div class="pl-20 text-xl">
                    <p>Développeur web et mobile full-stack</p>
                </div>
            </div>
            <div x-data="{ isHovered: false }" class="pl-20">
                <div
                    class="relative px-6 py-2 w-fit overflow-hidden group bg-blue-primary-color"
                    @mouseenter="isHovered = true"
                    @mouseleave="isHovered = false"
                >
                    <div
                        class="absolute inset-0 bg-blue-fifth-color transform -translate-x-full transition-transform duration-500 group-hover:translate-x-0"
                    ></div>

                    <a
                        class="relative z-10 text-2xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                        href=""
                    >
                        Me découvrir
                    </a>
                </div>
            </div>

            <!--
            <p>
                Actuellement titulaire d'un baccalauréat STI2D (Sciences et
                Technologies de l'Industrie et du Développement Durable), je poursuis
                mes études à l'IUT de Haguenau dans la filière MMI (Métiers du
                Multimédia et de l'Internet) en vue d'obtenir mon diplôme de niveau
                BAC +3. Je suis actuellement à la recherche d'un stage de 10 semaines,
                ainsi que d'une alternance d'une durée d'un an ou d'un an et demi.
            </p>-->
        </div>
        <livewire:social-links/>
    </header>
    <div class="flex px-28 justify-between items-center">
        <livewire:projects-count/>
    </div>
    <div class="px-4 py-8 bg-blue-fifth-color flex flex-col items-center">
        <h2 class="text-3xl font-bold text-center mb-6">Mes Projets</h2>

        <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projectRandom as $project)
                <div
                    class="bg-blue-sixth-color shadow-lg rounded-lg overflow-hidden transition duration-300 transform hover:scale-105">
                    <img src="{{ asset('storage/' . $project->image_visuel) }}" alt="{{ $project->name }}"
                         class="w-full h-48 object-cover object-top">


                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $project->name }}</h3>

                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($project->description, 100) }}</p>

                        <div class="flex flex-wrap mt-3">
                            @foreach ($project->languages as $language)
                                <span
                                    class="bg-blue-seventh-color text-black text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                {{ $language->name }}
                            </span>
                            @endforeach
                        </div>

                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex space-x-4">
                                <a href="{{ $project->url_git }}" target="_blank"
                                   class="text-gray-700 hover:text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-1 text-gray-600 hover:text-black transition"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12 0C5.37 0 0 5.373 0 12c0 5.303 3.438 9.8 8.207 11.385.6.113.793-.26.793-.577 0-.285-.01-1.04-.015-2.04-3.34.727-4.042-1.61-4.042-1.61-.547-1.385-1.335-1.755-1.335-1.755-1.09-.743.083-.728.083-.728 1.207.084 1.842 1.24 1.842 1.24 1.07 1.83 2.807 1.3 3.49.994.107-.774.42-1.3.76-1.6-2.665-.3-5.467-1.332-5.467-5.93 0-1.312.467-2.39 1.237-3.23-.125-.3-.535-1.515.115-3.155 0 0 1.01-.322 3.3 1.23a11.56 11.56 0 0 1 3-.403c1.02.005 2.04.138 3 .403 2.29-1.553 3.3-1.23 3.3-1.23.65 1.64.24 2.855.12 3.155.77.84 1.23 1.92 1.23 3.23 0 4.61-2.81 5.62-5.48 5.91.43.37.81 1.1.81 2.22 0 1.6-.015 2.89-.015 3.28 0 .32.19.69.8.57C20.57 21.8 24 17.3 24 12c0-6.627-5.37-12-12-12z"/>
                                    </svg>
                                    GitHub
                                </a>
                                <a href="{{ $project->url_site }}" target="_blank"
                                   class="text-gray-700 hover:text-gray-900 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="w-5 h-5 mr-1 text-gray-600 hover:text-black transition">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                                    </svg>

                                    Site internet
                                </a>
                            </div>

                            <x-link.link href="{{route('project.show', ['project' => $project])}}"
                                         name="Voir le projet"/>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout.main>
