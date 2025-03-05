<x-layout.main title="Les éléments de la timeline" class="my-8">
    <div class="container">
        <div class="mb-8 text-center">
            <x-link.link href="{{ route('timeline.create') }}" name="Créer un élément de la timeline"
                         class="px-6 py-2 bg-blue-seventh-color text-white rounded-lg shadow-md hover:bg-blue-fourth-color transition-all duration-300"/>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($timelines as $timeline)
                <div class="flex flex-col bg-white rounded-lg shadow-lg border border-gray-200 p-6">
                    <div class="mb-4">
                        <p class="text-xl font-semibold text-blue-fifth-color">Titre : <span class="text-blue-seventh-color">{{ $timeline->title }}</span></p>
                        <p class="text-lg text-gray-700">Date : <span class="text-blue-seventh-color">{{ $timeline->date }}</span></p>
                    </div>

                    <div class="flex-1 mb-4">
                        <p class="text-lg text-gray-700">Description :</p>
                        <p class="text-gray-700">{{ $timeline->description }}</p>
                    </div>

                    <div class="flex space-x-4 mt-4">
                        <x-link.link href="{{ route('timeline.edit', ['timeline' => $timeline]) }}" name="Modifier l'élément"
                                     class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition-all duration-300"/>
                        <form action="{{ route('timeline.destroy', ['timeline' => $timeline]) }}" method="POST" class="inline">
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
