<x-layout.main title="Mes projets">
    <div class="m-8">
        <x-link.link href="{{ route('project.create') }}" name="Créer un projet"/>
    </div>
    <div>
        @foreach($projects as $project)
            <div>
                <div>
                    <img src="{{ asset('storage/' . $project->image_visuel) }}" alt="Visuel principal">
                </div>
                <div>
                    <h3>{{$project->name}}</h3>
                    <p>{{$project->date_publication}}</p>
                    <ul>
                        @foreach($project->languages as $language)
                            <li>{{$language->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="m-4 flex space-x-4">
                    <x-link.link href="{{route('project.show', ['project' => $project])}}" name="Voir le détail"/>
                    <x-link.link href="{{route('project.edit', ['project' => $project])}}" name="Modifier le projet"/>
                    <form action="{{route('project.destroy', ['project' => $project])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-form.button name="Supprimer"/>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout.main>
