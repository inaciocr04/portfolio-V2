<x-layout.main title="Modifier le language {{$language->name}}">
    <h1>Modifier le language</h1>

    <form action="{{route('language.update', $language->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Nom du language</label>
        <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $language->name) }}" required>
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <div class="form-group">
            <label for="logo_language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Image principale
            </label>
            <input type="file" name="logo_language" id="logo_language" accept="image/*"
                   class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            @error('logo_language')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            @if ($language->logo_language)
                <p>Image actuelle :</p>
                <img src="{{ asset('storage/' . $language->logo_language) }}" alt="Image principale" style="max-width: 200px;">
            @endif
        </div>

        <div class="form-group">
            <label for="language_type_id">Type de langage</label>
            <select name="language_type_id" id="language_type_id" class="form-select" required>
                <option value="">Sélectionnez un type</option>
                @foreach($languageTypes as $languageType)
                    <option value="{{ $languageType->id }}" {{ $language->language_type_id == $languageType->id ? 'selected' : '' }}>
                        {{ $languageType->name }}
                    </option>
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
                            <input type="checkbox" name="origin_languages[]" value="{{ $originLanguage->id }}"
                                   @if(in_array($originLanguage->id, $language->originLanguages->pluck('id')->toArray())) checked @endif>
                            {{ $originLanguage->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('origin_languages')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <x-form.button name="Modifier"/>
    </form>
</x-layout.main>
