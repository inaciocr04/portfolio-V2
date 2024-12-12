<x-layout.main title="Modifier le language {{$language->name}}">
    <h1>Modifier le language</h1>

    <form action="{{route('language.update', $language->id)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nom du language</label>
        <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $language->name) }}" required>
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <label for="description">Description du language</label>
        <textarea name="description" id="description" class="form-textarea" rows="5">{{ old('description', $language->description ) }}</textarea>
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror

        <x-form.button name="Modifier"/>
    </form>
</x-layout.main>
