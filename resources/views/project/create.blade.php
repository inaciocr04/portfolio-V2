<x-layout.main>
    <h1>Ajouter un nouveau projet</h1>
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nom du projet</label>
            <input type="text" name="name" id="name" class="form-input" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-textarea" rows="5" required></textarea>
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <div clas="form-group">
            <lael for="image_visuel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image principale</lael>
            <input type="file" name="image_visuel" id="image_visuel" class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" required>
            @error('image_visuel')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        @for ($i = 1; $i <= 5; $i++)
            <div class="form-group">
                <label for="image_deco{{ $i }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image décorative {{ $i }}</label>
                <input type="file" name="image_deco{{ $i }}" id="image_deco{{ $i }}" class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                @error("image_deco$i")
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        @endfor
            <div class="form-group">
                <label for="languages">Langues du projet</label>
                <div>
                    @foreach ($languages as $language)
                        <div class="form-check">
                            <input type="checkbox" name="languages[]" value="{{ $language->id }}" id="language_{{ $language->id }}" class="form-check-input">
                            <label for="language_{{ $language->id }}" class="form-check-label">{{ $language->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('languages')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        <!-- Bouton d'envoi -->
        <button type="submit" class="btn btn-primary">Ajouter le projet</button>
    </form>
</x-layout.main>