<x-layout.main title="Détail du projet {{$project->name}} ">
    <div>
        <div>
            <div>
                <img src="{{ asset('storage/' . $project->image_visuel) }}" alt="Visuel principal">
            </div>
            <div>
                <h3>{{$project->name}}</h3>
                <p>{{$project->description}}</p>
                <p>{{$project->date_publication}}</p>
                @foreach($project->languages as $language)
                    <p>{{$language->name}}</p>
                @endforeach
            </div>
        </div>
        <div>
            <ul>
                @for ($i = 1; $i <= 5; $i++)
                    @php
                        $imageField = 'image_deco' . $i;
                    @endphp
                    @if ($project->$imageField)
                        <li><img src="{{ asset('storage/' . $project->$imageField) }}" alt="Décorative {{ $i }}" style="max-width: 100px; height: auto; margin-right: 10px;"></li>
                    @endif
                @endfor
            </ul>
        </div>
    </div>
</x-layout.main>
