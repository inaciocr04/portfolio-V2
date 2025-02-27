<x-layout.main title="Modifier {{$languageType->name}}">
    <form action="{{ route('languageType.update', $languageType->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom du type de langage</label>
            <input type="text" name="name" id="name" class="form-input" value="{{old('name', $languageType->name)}}" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <x-form.button name="Modifier"/>
    </form>
</x-layout.main>
