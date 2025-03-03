<x-layout.main title="Mes projets">
    @auth
        <div>
            <x-link.link href="{{ route('project.create') }}" name="Créer un projet"/>
        </div>
    @endauth

    <div class="px-4 py-8 flex flex-col items-center justify-center">
        <h2 class="text-3xl font-bold text-center mb-6">Mes Projets</h2>

        <!-- Formulaire de recherche avec une jolie barre -->
        <form method="GET" action="{{ route('project.index') }}" class="mb-10 mt-4 w-full md:w-1/4 flex items-center">
            <div class="relative w-full">
                <input
                    type="text"
                    name="search"
                    class="form-input w-full pl-10 pr-4 py-2 border rounded-tl-full rounded-bl-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Rechercher un projet"
                    value="{{ request('search') }}">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                </svg>
            </div>

            <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-white rounded-tr-full rounded-br-full hover:bg-blue-600 transition duration-300">
                Rechercher
            </button>
        </form>

        <!-- Formulaire de filtres -->
        <form method="GET" action="{{ route('project.index') }}"
              class="mb-10 mt-4 flex flex-col md:flex-row gap-4 items-start md:items-center">
            <div class="w-full md:w-2/4">
                <label class="font-bold">Formation :</label>
                <select name="language_id[]" class="form-select block w-full mt-1" multiple id="language_id">
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}" {{ in_array($language->id, request()->input('language_id', [])) ? 'selected' : '' }}>
                            {{ $language->name }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="w-full md:w-2/4">
                <label class="font-bold">Statut :</label>
                <select name="status[]" class="form-select block w-full mt-1" multiple id="status">
                    <option value="en_cours" {{ in_array('en_cours', request()->input('status', [])) ? 'selected' : '' }}>
                        En cours
                    </option>
                    <option value="termine" {{ in_array('termine', request()->input('status', [])) ? 'selected' : '' }}>
                        Terminé
                    </option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded mt-4 md:mt-0">Appliquer les filtres
            </button>
        </form>

        <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projects as $project)
                <div
                    class="bg-blue-sixth-color shadow-lg rounded-lg overflow-hidden transition duration-300 transform hover:scale-105">
                    <img src="{{ asset('storage/' . $project->image_visuel) }}" alt="{{ $project->name }}"
                         class="w-full h-48 object-cover object-top">

                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $project->name }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($project->description, 210) }}</p>
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

                            <div class="space-y-2">
                                <x-link.link href="{{route('project.show', ['project' => $project])}}"
                                             name="Voir le projet"/>
                                @auth
                                    <x-link.link href="{{route('project.edit', ['project' => $project])}}"
                                                 name="Modifier le projet"/>
                                    <form action="{{route('project.destroy', ['project' => $project])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-form.button name="Supprimer"/>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#language_id').select2({
                placeholder: 'Sélectionnez une formation',
                allowClear: true,
                width: '100%',
            });
            $('#status').select2({
                placeholder: 'Sélectionnez une formation',
                allowClear: true,
                width: '100%',
            });
        });
    </script>
</x-layout.main>
