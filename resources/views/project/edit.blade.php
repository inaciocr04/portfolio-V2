<x-layout.main title="Modifier le projet {{$project->name}}">
    <h1>Modifier le projet</h1>
    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Méthode PUT pour la mise à jour -->

        <!-- Nom du projet -->
        <div class="form-group">
            <label for="name">Nom du projet</label>
            <input type="text" name="name" id="name" class="form-input"
                   value="{{ old('name', $project->name) }}" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-textarea" rows="5" required>{{ old('description', $project->description) }}</textarea>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="languages">Langues du projet</label>
            <div>
                @foreach ($languages as $language)
                    <div class="form-check">
                        <input
                            type="checkbox"
                            name="languages[]"
                            value="{{ $language->id }}"
                            id="language_{{ $language->id }}"
                            class="form-check-input"
                            @if(in_array($language->id, $projectLanguages ?? [])) checked @endif
                        >
                        <label for="language_{{ $language->id }}" class="form-check-label">{{ $language->name }}</label>
                    </div>
                @endforeach
            </div>
            @error('languages')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <!-- Image principale -->
        <div class="form-group">
            <label for="image_visuel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image principale</label>
            <input type="file" name="image_visuel" id="image_visuel" class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            @error('image_visuel')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <!-- Affichage de l'image actuelle -->
            @if ($project->image_visuel)
                <p>Image actuelle :</p>
                <img src="{{ asset('storage/' . $project->image_visuel) }}" alt="Image principale" style="max-width: 200px;">
            @endif
        </div>

        <!-- Images décoratives -->
        @for ($i = 1; $i <= 5; $i++)
            @php
                $imageField = 'image_deco' . $i;
            @endphp
            <div class="form-group">
                <label for="image_deco{{ $i }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image décorative {{ $i }}</label>
                <input type="file" name="image_deco{{ $i }}" id="image_deco{{ $i }}" class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                @error("image_deco$i")
                <small class="text-danger">{{ $message }}</small>
                @enderror

                <!-- Affichage de l'image actuelle -->
                @if ($project->$imageField)
                    <p>Image actuelle {{ $i }} :</p>
                    <img src="{{ asset('storage/' . $project->$imageField) }}" alt="Décorative {{ $i }}" style="max-width: 100px; margin-right: 10px;">
                @endif
            </div>
        @endfor

        <div class="flex items-center space-x-4 mt-4">
            <div>
                <input type="radio" id="en_cours" name="status" value="en cours"
                       @checked($project->status === 'en cours')
                       class="mr-2">
                <label for="en_cours" class="text-lg">En cours</label>
            </div>
            <div>
                <input type="radio" id="termine" name="status" value="terminé"
                       @checked($project->status === 'terminé')
                       class="mr-2">
                <label for="termine" class="text-lg">Terminé</label>
            </div>
        </div>

        <div class="flex" x-data="{ toggle: {{ $project->active }} }">
            <div class="relative rounded-full w-12 h-6 transition duration-200 ease-linear"
                 :class="[toggle === 1 ? 'bg-green-400' : 'bg-gray-400']">

                <label for="toggle"
                       class="absolute left-0 bg-white border-2 mb-2 w-6 h-6 rounded-full transition transform duration-100 ease-linear cursor-pointer"
                       :class="[toggle === 1 ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400']"></label>

                <input type="checkbox" id="toggle" name="toggle"
                       class="appearance-none w-full h-full active:outline-none focus:outline-none"
                       :checked="toggle === 1"
                       @click="toggle = toggle === 0 ? 1 : 0; $dispatch('input', toggle)" />
            </div>

            <input type="hidden" name="active" :value="toggle" />

            <span class="ml-2 text-lg" :class="[toggle === 1 ? 'text-green-500' : 'text-gray-500']">
                    <span x-text="toggle === 1 ? 'Projet Actif' : 'Projet Inactif'"></span>
                </span>
        </div>



        <!-- Bouton de mise à jour -->
        <button type="submit" class="btn btn-primary">Mettre à jour le projet</button>
    </form>
</x-layout.main>
