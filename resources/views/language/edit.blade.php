<x-layout.main title="Modifier le langage {{$language->name}}" class="my-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-blue-fifth-color mb-6 text-center">Modifier le langage</h1>

        <form action="{{route('language.update', $language->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nom du langage -->
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Nom du langage</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" value="{{ old('name', $language->name) }}" required>
                @error('name')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Image du langage -->
            <div class="mb-4">
                <label for="logo_language" class="block text-lg font-medium text-gray-700">Image principale</label>
                <input type="file" name="logo_language" id="logo_language" accept="image/*"
                       class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-seventh-color">
                @error('logo_language')
                <small class="text-red-500">{{ $message }}</small>
                @enderror

                @if ($language->logo_language)
                    <div class="mt-2">
                        <p>Image actuelle :</p>
                        <img src="{{ asset('storage/' . $language->logo_language) }}" alt="Image principale" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <!-- Type de langage -->
            <div class="mb-4">
                <label for="language_type_id" class="block text-lg font-medium text-gray-700">Type de langage</label>
                <select name="language_type_id" id="language_type_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" required>
                    <option value="">Sélectionnez un type</option>
                    @foreach($languageTypes as $languageType)
                        <option value="{{ $languageType->id }}" {{ $language->language_type_id == $languageType->id ? 'selected' : '' }}>{{ $languageType->name }}</option>
                    @endforeach
                </select>
                @error('language_type_id')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Origines du langage -->
            <div class="mb-4">
                <label for="originLanguages" class="block text-lg font-medium text-gray-700">Origines du langage</label>
                <div class="space-y-2">
                    @foreach($originLanguages as $originLanguage)
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="origin_languages[]" value="{{ $originLanguage->id }}"
                                   @if(in_array($originLanguage->id, $language->originLanguages->pluck('id')->toArray())) checked @endif
                                   class="rounded">
                            <label for="origin_language_{{ $originLanguage->id }}" class="text-gray-700">{{ $originLanguage->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('origin_languages')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Bouton de modification -->
            <div class="mt-6 text-center">
                <x-form.button name="Modifier" class="bg-blue-seventh-color text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300"/>
            </div>
        </form>
    </div>
</x-layout.main>
