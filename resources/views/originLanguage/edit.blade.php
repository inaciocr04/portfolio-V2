<x-layout.main title="Modifier {{$originLanguage->name}}">
    <form action="{{ route('originLanguage.update', $originLanguage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom de l'origine du language</label>
            <input type="text" name="name" id="name" class="form-input" value="{{old('name', $originLanguage->name)}}" required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <x-form.button name="Modifier"/>
    </form>
</x-layout.main>
