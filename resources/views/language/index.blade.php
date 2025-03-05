<x-layout.main title="Les langues" class=" my-8">
    <div class="container">
        <div class="mb-8 text-center">
            <x-link.link href="{{ route('language.create') }}" name="Créer un language"
                         class="px-6 py-2 bg-blue-seventh-color text-white rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300"/>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($languages as $language)
                <div class="flex flex-col bg-white rounded-lg shadow-lg border border-gray-200 p-6">
                    <div class="flex items-center mb-4 space-x-4">
                        <img src="{{ asset('storage/' . $language->logo_language) }}" alt="{{ $language->name }}" class="w-16 h-16 object-cover rounded-full">
                        <div class="space-y-2">
                            <p class="text-xl font-semibold text-blue-fifth-color">{{ $language->name }}</p>
                            <p class="text-lg text-gray-700">Type: <span class="text-blue-seventh-color font-semibold">{{ $language->languageType->name }}</span></p>
                        </div>
                    </div>

                    <div class="flex-1 mb-4">
                        <p class="text-lg text-gray-700">Méthode d'apprentissage :</p>
                        <div class="flex flex-wrap space-x-2">
                            @foreach($language->originLanguages as $originLanguage)
                                <span class="bg-gray-200 text-gray-700 rounded-full px-4 py-1">{{ $originLanguage->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex space-x-4 mt-4">
                        <x-link.link href="{{ route('language.edit', ['language' => $language]) }}" name="Modifier le language"
                                     class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition-all duration-300"/>
                        <form action="{{ route('language.destroy', ['language' => $language]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <x-form.button name="Supprimer"
                                           class="px-6 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition-all duration-300"/>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout.main>
