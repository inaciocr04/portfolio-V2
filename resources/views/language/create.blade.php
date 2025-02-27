<x-layout.main title="Ajouter un language">
    <h1>Ajouter un nouveau language</h1>

    <form action="{{ route('language.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Nom du language</label>
        <input type="text" name="name" id="name" class="form-input" required>
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="logo_language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Image principale
            </label>
            <input type="file" name="logo_language" id="logo_language" accept="image/*"
                   class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" required>
            @error('logo_language')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="language_type_id">Type de langage</label>
            <select name="language_type_id" id="language_type_id" class="form-select" required>
                <option value="">Sélectionnez un type</option>
                @foreach($languageTypes as $languageType)
                    <option value="{{ $languageType->id }}">{{ $languageType->name }}</option>
                @endforeach
            </select>
            @error('language_type_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="originLanguages">Origines du language</label>
            <div>
                @foreach($originLanguages as $originLanguage)
                    <div>
                        <label>
                            <input type="checkbox" name="origin_languages[]" value="{{ $originLanguage->id }}">
                            {{ $originLanguage->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('origin_languages')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <x-form.button name="Créer"/>
    </form>
</x-layout.main>
