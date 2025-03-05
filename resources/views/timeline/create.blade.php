<x-layout.main title="Créer un élément de timeline" class="my-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-3xl font-bold text-blue-fifth-color mb-6 text-center">Créer un élément de timeline</h1>

        <form action="{{ route('timeline.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-lg font-medium text-gray-700">Titre de l'élément</label>
                <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" required>
                @error('title')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-lg font-medium text-gray-700">Date de l'élément</label>
                <input type="text" name="date" id="date" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" required>
                @error('date')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-medium text-gray-700">Description de l'élément</label>
                <textarea name="description" id="description" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-seventh-color focus:outline-none" rows="5" required></textarea>
                @error('description')
                <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="mt-6 text-center">
                <x-form.button name="Créer" class="bg-blue-seventh-color text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300"/>
            </div>
        </form>
    </div>
</x-layout.main>
