<x-layout.main title="Créer un type de langage">
    <form action="{{ route('languageType.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nom du type de langage</label>
            <input type="text" name="name" id="name" class="form-input" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <x-form.button name="Créer"/>
    </form>
</x-layout.main>
