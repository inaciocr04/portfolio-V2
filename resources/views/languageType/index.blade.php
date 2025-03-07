<x-layout.main title="Les types de langage" class="my-8">
    <div class="container">
        <div class="mb-8 text-center">
            <x-link.link href="{{ route('languageType.create') }}" name="Créer un type de langage"
                         class="px-6 py-2 bg-blue-seventh-color text-white rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300"/>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($languageTypes as $languageType)
                <div class="flex flex-col bg-white rounded-lg shadow-lg border border-gray-200 p-6">
                    <div class="mb-4">
                        <p class="text-xl font-semibold text-blue-fifth-color">{{ $languageType->name }}</p>
                    </div>

                    <div class="flex space-x-4 mt-4">
                        <x-link.link href="{{ route('languageType.edit', ['languageType' => $languageType]) }}" name="Modifier le type"
                                     class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition-all duration-300"/>
                        <form action="{{ route('languageType.destroy', ['languageType' => $languageType]) }}" method="POST" class="inline">
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
