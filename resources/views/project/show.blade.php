<x-layout.main title="Détail du projet {{$project->name}} " class="mt-5">
    <div class="container">
        <div class="flex justify-center">
            <div x-data="{ activeImage: '{{ asset('storage/' . $project->image_visuel) }}' }"
                 class="flex article_seul justify-center align-center">
                <div class="flex space-x-4 ">
                    <div class="flex flex-col space-y-4">
                        @foreach([$project->image_visuel, $project->image_deco1, $project->image_deco2, $project->image_deco3, $project->image_deco4, $project->image_deco5] as $image)
                            @if($image)
                                <img class="w-20 h-auto rounded-xl cursor-pointer"
                                     src="{{ asset('storage/' . $image) }}"
                                     alt="{{ $project->name }}"
                                     x-on:mouseenter="activeImage = '{{ asset('storage/' . $image) }}'">
                            @endif
                        @endforeach
                    </div>

                    <!-- Image principale -->
                    <div class=" relative grande_image">
                        <img class="image_seul" :src="activeImage" alt="{{ $project->name }}" x-show="activeImage"
                             x-transition>
                    </div>

                </div>
            </div>

            <div>
                <h2>{{$project->name}}</h2>
                <h3 class="font-bold">Description du projet</h3>
                <p>{{$project->description}}</p>
                <p>{{$project->date_publication}}</p>
                <h3 class="font-bold">Technologie utilisé</h3>
                <div class="flex flex-wrap">
                    @foreach ($project->languages as $language)
                        <span
                            class="bg-blue-seventh-color text-black text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                {{ $language->name }}
                            </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-layout.main>
