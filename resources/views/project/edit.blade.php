<x-layout.main>
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

        <!-- Bouton de mise à jour -->
        <button type="submit" class="btn btn-primary">Mettre à jour le projet</button>
    </form>
</x-layout.main>