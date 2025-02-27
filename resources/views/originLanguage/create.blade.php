<x-layout.main title="Créer une origine de language">
    <form action="{{ route('originLanguage.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nom de l'origine du language</label>
            <input type="text" name="name" id="name" class="form-input" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <x-form.button name="Créer"/>
    </form>
</x-layout.main>
