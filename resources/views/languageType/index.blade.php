<x-layout.main>
    <div class="mb-8">
        <x-link.link href="{{route('languageType.create')}}" name="Créer un type de langage"/>
    </div>
    <ul>
    @foreach($languageTypes as $languageType)
        <li>{{$languageType->name}}
            <x-link.link href="{{route('languageType.edit', ['languageType' => $languageType])}}" name="Modifier le language"/>
            <form action="{{route('languageType.destroy', ['languageType' => $languageType])}}" method="POST">
                @csrf
                @method('DELETE')
                <x-form.button name="Supprimer"/>
            </form></li>
    @endforeach
    </ul>
</x-layout.main>
