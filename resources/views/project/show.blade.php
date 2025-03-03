<x-layout.main title="Détail du projet {{$project->name}} " class="mt-10">
    <div class="container">
        <div class="flex justify-center">
            <div class="w-1/2" x-data="{ activeImage: '{{ asset('storage/' . $project->image_visuel) }}' }"
                 class="flex article_seul justify-center align-center">
                <div class="flex space-x-4 ">
                    <div class="flex flex-col space-y-4">
                        @foreach([$project->image_visuel, $project->image_deco1, $project->image_deco2, $project->image_deco3, $project->image_deco4, $project->image_deco5] as $image)
                            @if($image)
                                <img class="w-20 h-20 rounded-xl cursor-pointer"
                                     src="{{ asset('storage/' . $image) }}"
                                     alt="{{ $project->name }}"
                                     x-on:mouseenter="activeImage = '{{ asset('storage/' . $image) }}'">
                            @endif
                        @endforeach
                    </div>

                    <!-- Image principale -->
                    <div class=" relative grande_image">
                        <img class="image_seul" :src="activeImage" alt="{{ $project->name }}" x-show="activeImage"
                             x-transition>
                    </div>

                </div>
            </div>

            <div class="w-1/2 space-y-3">
                <div class="flex items-center justify-between w-full">
                    <h2 class="font-bold text-2xl text-center flex-1">{{$project->name}}</h2>
                    <div class="flex space-x-4">
                        @if($project->status == 'en_cours')
                            <p class="flex items-center gap-1 bg-orange-500 text-white text-sm font-bold px-4 py-1 rounded-full shadow-lg tracking-wide">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                {{ ucwords(str_replace('_', ' ', $project->status)) }}
                            </p>
                        @elseif($project->status == 'termine')
                            <p class="flex items-center gap-1 bg-blue-fourth-color text-white text-sm font-bold px-4 py-1 rounded-full shadow-lg tracking-wide">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                                </svg>
                                Terminé
                            </p>
                        @else
                            <p class="flex items-center gap-1 bg-blue-fourth-color text-white text-sm font-bold px-4 py-1 rounded-full shadow-lg tracking-wide">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                                </svg>
                                {{ ucfirst($project->status) }}
                            </p>
                        @endif
                        @auth
                            @if($project->active == 1)
                                <p class="flex items-center gap-1 bg-green-500 text-white text-sm font-bold px-4 py-1 rounded-full shadow-lg tracking-wide">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    Actif
                                </p>
                            @else
                                <p class="flex items-center gap-1 bg-orange-500 text-white text-sm font-bold px-4 py-1 rounded-full shadow-lg tracking-wide">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    Inactif
                                </p>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="space-y-3">
                    <h3 class="font-bold">Description du projet</h3>
                    <p>{{$project->description}}</p>
                </div>
                <p>{{$project->date_publication}}</p>
                <div class="space-y-3">
                    <h3 class="font-bold">Technologie utilisé</h3>
                    <div class="flex flex-wrap">
                        @foreach ($project->languages as $language)
                            <span
                                class="bg-blue-seventh-color text-black text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                {{ $language->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <div class="flex space-x-4">
                        <a href="{{ $project->url_git }}" target="_blank"
                           class="bg-blue-secondary-color text-gray-700  hover:text-gray-900 px-3 py-1 rounded text-sm flex items-center">
                            <svg class="w-5 h-5 mr-1 text-black"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 0C5.37 0 0 5.373 0 12c0 5.303 3.438 9.8 8.207 11.385.6.113.793-.26.793-.577 0-.285-.01-1.04-.015-2.04-3.34.727-4.042-1.61-4.042-1.61-.547-1.385-1.335-1.755-1.335-1.755-1.09-.743.083-.728.083-.728 1.207.084 1.842 1.24 1.842 1.24 1.07 1.83 2.807 1.3 3.49.994.107-.774.42-1.3.76-1.6-2.665-.3-5.467-1.332-5.467-5.93 0-1.312.467-2.39 1.237-3.23-.125-.3-.535-1.515.115-3.155 0 0 1.01-.322 3.3 1.23a11.56 11.56 0 0 1 3-.403c1.02.005 2.04.138 3 .403 2.29-1.553 3.3-1.23 3.3-1.23.65 1.64.24 2.855.12 3.155.77.84 1.23 1.92 1.23 3.23 0 4.61-2.81 5.62-5.48 5.91.43.37.81 1.1.81 2.22 0 1.6-.015 2.89-.015 3.28 0 .32.19.69.8.57C20.57 21.8 24 17.3 24 12c0-6.627-5.37-12-12-12z"/>
                            </svg>
                            GitHub
                        </a>
                        @if($project->url_site)
                            <a href="{{ $project->url_site }}" target="_blank"
                               class="bg-blue-secondary-color text-gray-700 hover:text-gray-900 px-3 py-1 rounded text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor"
                                     class="w-5 h-5 mr-1 text-black">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                                </svg>
                                Site internet
                            </a>
                        @else
                            <p class="bg-blue-secondary-color px-3 py-1 rounded text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor"
                                     class="w-5 h-5 mr-1 text-black">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                                </svg>
                                Le site n'est plus mise en ligne
                            </p>
                        @endif
                    </div>
                </div>
                @auth
                    <div class="space-y-2">
                        <x-link.link href="{{route('project.edit', ['project' => $project])}}"
                                     name="Modifier le projet"/>
                        <form action="{{route('project.destroy', ['project' => $project])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-form.button name="Supprimer"/>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between">
            <div class="w-2/4">
                <h3 class="font-bold text-3xl flex-1 text-center">Présentation du site en vidéo</h3>
                <p>Comme vous pouvez le voir, voici une vidéo qui vous présente un aperçu complet du site que j'ai
                    réalisé. Cette vidéo est particulièrement utile au cas où le site ne serait plus en ligne, afin que
                    vous puissiez toujours avoir une idée précise du projet et de son contenu, même s'il n'est plus
                    accessible directement.</p>
            </div>
            <iframe class="w-2/4" height="450"
                    src="{{$project->video}}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>

</x-layout.main>
