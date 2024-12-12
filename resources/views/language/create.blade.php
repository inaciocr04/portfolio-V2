<x-layout.main title="Ajouter un language">
    <h1>Ajouter un nouveau language</h1>

    <form action="{{route('language.store')}}" method="POST">
        @csrf

        <label for="name">Nom du language</label>
        <input type="text" name="name" id="name" class="form-input" required>
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <label for="description">Description du language</label>
        <textarea name="description" id="description" class="form-textarea" rows="5"></textarea>
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror

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
            @error('originLanguages')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <x-form.button name="Créer"/>
    </form>
</x-layout.main>
