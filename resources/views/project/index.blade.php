 <x-layout.main title="Mes projets" class="container">
     @auth
        <div>
            <x-link.link href="{{ route('project.create') }}" name="Créer un projet"/>
        </div>
     @endauth
    <div class="flex ">
        @foreach($projects as $project)
            <div>
                <div>
                    <img class="w-60" src="{{ asset('storage/' . $project->image_visuel) }}" alt="Visuel principal">
                </div>
                <div>
                    <h3>{{$project->name}}</h3>
                    <p>{{$project->date_publication}}</p>
                    <p class="uppercase">{{$project->status}}</p>
                    <div>
                        <a href="{{$project->url_site}}"><i class="bi bi-link-45deg text-2xl"></i></a>
                        <a href="{{ $project->url_git }}"><i class="bi bi-github text-2xl"></i></a>
                    </div>
                    <div class="flex">
                        @foreach($project->languages as $language)
                            <p>{{$language->name}}, &nbsp;</p>
                        @endforeach
                    </div>
                </div>
                <div class="m-4 flex space-x-4">
                    <x-link.link href="{{route('project.show', ['project' => $project])}}" name="Voir le détail"/>
                    @auth
                    <x-link.link href="{{route('project.edit', ['project' => $project])}}" name="Modifier le projet"/>
                    <form action="{{route('project.destroy', ['project' => $project])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-form.button name="Supprimer"/>
                    </form>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</x-layout.main>
