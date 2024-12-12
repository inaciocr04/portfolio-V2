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

        <x-form.button name="Créer"/>
    </form>
</x-layout.main>
