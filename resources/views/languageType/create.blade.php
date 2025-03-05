<x-layout.main title="Créer un type de langage" class="my-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-blue-fifth-color mb-6 text-center">Créer un type de langage</h1>

        <form action="{{ route('languageType.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Nom du type de langage</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" required>
                @error('name')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mt-6 text-center">
                <x-form.button name="Créer" class="bg-blue-seventh-color text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300"/>
            </div>
        </form>
    </div>
</x-layout.main>
