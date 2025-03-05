<x-layout.main title="Modifier le projet {{$project->name}}" class="my-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-blue-fifth-color mb-6 text-center">Modifier le projet</h1>

        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nom du projet -->
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Nom du projet</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none"
                       value="{{ old('name', $project->name) }}" required>
                @error('name')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="5" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" required>{{ old('description', $project->description) }}</textarea>
                @error('description')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- URL du projet et Git -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="url_site" class="block text-lg font-medium text-gray-700">URL du projet</label>
                    <input type="text" name="url_site" id="url_site" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" value="{{ old('url_site', $project->url_site) }}">
                    @error('url_site')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="url_git" class="block text-lg font-medium text-gray-700">URL GitHub</label>
                    <input type="text" name="url_git" id="url_git" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" value="{{ old('url_git', $project->url_git) }}">
                    @error('url_git')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Vidéo -->
            <div class="mb-4">
                <label for="video" class="block text-lg font-medium text-gray-700">Vidéo</label>
                <input type="text" name="video" id="video" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" value="{{ old('video', $project->video) }}">
                @error('video')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Date de publication -->
            <div class="mb-4">
                <label for="date_publication" class="block text-lg font-medium text-gray-700">Date de publication</label>
                <input type="date" id="date_publication" name="date_publication" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" value="{{ old('date_publication', $project->date_publication) }}">
                @error('date_publication')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Langues du projet -->
            <div class="mb-4">
                <label for="languages" class="block text-lg font-medium text-gray-700">Langues du projet</label>
                <div class="flex flex-wrap gap-3">
                    @foreach ($languages as $language)
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="languages[]" value="{{ $language->id }}" id="language_{{ $language->id }}" class="rounded" @if(in_array($language->id, $projectLanguages ?? [])) checked @endif>
                            <label for="language_{{ $language->id }}" class="text-gray-700">{{ $language->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('languages')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Image principale -->
            <div class="mb-4">
                <label for="image_visuel" class="block text-lg font-medium text-gray-700">Image principale</label>
                <input type="file" name="image_visuel" id="image_visuel" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none">
                @error('image_visuel')
                <small class="text-red-500">{{ $message }}</small>
                @enderror

                <!-- Affichage de l'image actuelle -->
                @if ($project->image_visuel)
                    <p class="mt-2">Image actuelle :</p>
                    <img src="{{ asset('storage/' . $project->image_visuel) }}" alt="Image principale" class="max-w-xs mt-2">
                @endif
            </div>

            <!-- Images décoratives -->
            <div class="mb-4">
                @for ($i = 1; $i <= 5; $i++)
                    @php
                        $imageField = 'image_deco' . $i;
                    @endphp
                    <div class="mb-4">
                        <label for="image_deco{{ $i }}" class="block text-lg font-medium text-gray-700">Image décorative {{ $i }}</label>
                        <input type="file" name="image_deco{{ $i }}" id="image_deco{{ $i }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none">
                        @error("image_deco$i")
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror

                        <!-- Affichage de l'image actuelle -->
                        @if ($project->$imageField)
                            <p class="mt-2">Image actuelle {{ $i }} :</p>
                            <img src="{{ asset('storage/' . $project->$imageField) }}" alt="Image décorative {{ $i }}" class="max-w-xs mt-2">
                        @endif
                    </div>
                @endfor
            </div>

            <!-- Statut -->
            <div class="mb-4">
                <label class="block text-lg font-medium text-gray-700">Statut du projet</label>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" name="status" value="en_cours" @checked($project->status === 'en_cours') class="mr-2">
                        <span>En cours</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="status" value="termine" @checked($project->status === 'termine') class="mr-2">
                        <span>Terminé</span>
                    </label>
                </div>
            </div>

            <!-- Projet Actif/Inactif -->
            <div class="flex" x-data="{ toggle: {{ $project->active }} }">
                <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
                     :class="[toggle === 1 ? 'bg-green-400' : 'bg-gray-400']">

                    <label for="toggle"
                           class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
                           :class="[toggle === 1 ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>

                    <input type="checkbox" id="toggle" name="toggle"
                           class="appearance-none w-full h-full active:outline-none focus:outline-none"
                           :checked="toggle === 1"
                           @click="toggle = toggle === 0 ? 1 : 0; $dispatch('input', toggle)"/>
                </div>

                <input type="hidden" name="active" :value="toggle"/>

                <span class="ml-2 text-lg" :class="[toggle === 1 ? 'text-green-500' : 'text-gray-500']">
                    <span x-text="toggle === 1 ? 'Projet Actif' : 'Projet Inactif'"></span>
                </span>
            </div>

            <!-- Bouton de mise à jour -->
            <div class="mt-6 text-center">
                <button type="submit" class="bg-blue-seventh-color text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300">
                    Mettre à jour le projet
                </button>
            </div>
        </form>
    </div>
</x-layout.main>
