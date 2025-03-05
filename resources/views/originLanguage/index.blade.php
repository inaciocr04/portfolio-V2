<x-layout.main title="Les origines des langages" class=" my-8">
    <div class="container">
        <div class="mb-8 text-center">
            <x-link.link href="{{ route('originLanguage.create') }}" name="Créer une origine du langage"
                         class="px-6 py-2 bg-blue-seventh-color text-white rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300"/>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($originLanguages as $originLanguage)
                <div class="flex flex-col bg-white rounded-lg shadow-lg border border-gray-200 p-6">
                    <div class="flex items-center mb-4 space-x-4">
                        <div class="space-y-2">
                            <p class="text-xl font-semibold text-blue-fifth-color">{{ $originLanguage->name }}</p>
                        </div>
                    </div>

                    <div class="flex space-x-4 mt-4">
                        <x-link.link href="{{ route('originLanguage.edit', ['originLanguage' => $originLanguage]) }}"
                                     name="Modifier le langage"
                                     class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition-all duration-300"/>
                        <form action="{{ route('originLanguage.destroy', ['originLanguage' => $originLanguage]) }}"
                              method="POST" class="inline">
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
