<x-layout.main>
    <div class="mb-8">
        <x-link.link href="{{route('originLanguage.create')}}" name="Créer une origine du language"/>
    </div>
    <ul>
    @foreach($originLanguages as $originLanguage)
        <li>{{$originLanguage->name}}
            <x-link.link href="{{route('originLanguage.edit', ['originLanguage' => $originLanguage])}}" name="Modifier le language"/>
            <form action="{{route('originLanguage.destroy', ['originLanguage' => $originLanguage])}}" method="POST">
                @csrf
                @method('DELETE')
                <x-form.button name="Supprimer"/>
            </form></li>
    @endforeach
    </ul>
</x-layout.main>
