<x-layout.main title="Modifier {{$originLanguage->name}}" class="my-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-blue-fifth-color mb-6 text-center">Modifier une origine de langue</h1>

        <form action="{{ route('originLanguage.update', $originLanguage->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Nom de l'origine du langage</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" value="{{ old('name', $originLanguage->name) }}" required>
                @error('name')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mt-6 text-center">
                <x-form.button name="Modifier" class="bg-blue-seventh-color text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300"/>
            </div>
        </form>
    </div>
</x-layout.main>
