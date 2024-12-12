<x-layout.main title="Les languages">
    <div class="mb-8">
        <x-link.link href="{{route('language.create')}}" name="Créer un language"/>
    </div>
    <div class="space-y-4">
        @foreach($languages as $language)
        <div class="flex space-x-4 items-center">
            <p>{{$language->name}}</p>
            <x-link.link href="{{route('language.edit', ['language' => $language])}}" name="Modifier le language"/>
            <form action="{{route('language.destroy', ['language' => $language])}}" method="POST">
                @csrf
                @method('DELETE')
                <x-form.button name="Supprimer"/>
            </form>
        </div>

        @endforeach
    </div>
</x-layout.main>
