<x-layout.main title="Ajouter un projet" class="my-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-blue-fifth-color mb-6 text-center">Ajouter un nouveau projet</h1>

        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nom du projet -->
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Nom du projet</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" required>
                @error('name')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- URL du projet et GitHub -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="url_site" class="block text-lg font-medium text-gray-700">URL du projet</label>
                    <input type="text" name="url_site" id="url_site" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none">
                    @error('url_site')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="url_git" class="block text-lg font-medium text-gray-700">URL GitHub</label>
                    <input type="text" name="url_git" id="url_git" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none">
                    @error('url_git')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Vidéo -->
            <div class="mt-4">
                <label for="video" class="block text-lg font-medium text-gray-700">Vidéo</label>
                <input type="text" name="video" id="video" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none">
                @error('video')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Description -->
            <div class="mt-4">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="5" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" required></textarea>
                @error('description')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Images -->
            <div class="mt-6">
                <label for="image_visuel" class="block text-lg font-medium text-gray-700">Image principale</label>
                <input type="file" name="image_visuel" id="image_visuel" class="w-full p-2 border border-gray-300 rounded-lg">
                @error('image_visuel')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Images décoratives -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                @for ($i = 1; $i <= 5; $i++)
                    <div>
                        <label for="image_deco{{ $i }}" class="block text-lg font-medium text-gray-700">Image décorative {{ $i }}</label>
                        <input type="file" name="image_deco{{ $i }}" id="image_deco{{ $i }}" class="w-full p-2 border border-gray-300 rounded-lg">
                        @error("image_deco$i")
                        <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                @endfor
            </div>

            <!-- Langues du projet -->
            <div class="mt-6">
                <label for="languages" class="block text-lg font-medium text-gray-700">Langues du projet</label>
                <div class="flex flex-wrap gap-3">
                    @foreach ($languages as $language)
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="languages[]" value="{{ $language->id }}" id="language_{{ $language->id }}" class="rounded">
                            <label for="language_{{ $language->id }}" class="text-gray-700">{{ $language->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('languages')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Date de publication -->
            <div class="mt-6">
                <label for="date_publication" class="block text-lg font-medium text-gray-700">Date de publication</label>
                <input type="date" id="date_publication" name="date_publication" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none">
                @error('date_publication')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Statut -->
            <div class="mt-6">
                <label class="block text-lg font-medium text-gray-700">Statut du projet</label>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" name="status" value="en_cours" checked class="mr-2">
                        <span>En cours</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="status" value="termine" class="mr-2">
                        <span>Terminé</span>
                    </label>
                </div>
            </div>

            <!-- Bouton d'envoi -->
            <div class="mt-6 text-center">
                <button type="submit" class="bg-blue-seventh-color text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300">
                    Ajouter le projet
                </button>
            </div>
        </form>
    </div>
</x-layout.main>
