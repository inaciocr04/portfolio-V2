<x-layout.main>
    <header class="flex justify-around items-center bg-blue-secondary-color">
        <div class="space-y-5">
            <div>
                <div class="flex items-center space-x-3">
                    <div class="w-20 h-1 bg-blue-fifth-color rounded">
                    </div>
                    <p class="font-quicksand text-2xl text-blue-fifth-color">
                        <span class="font-bold ">Bonjour, </span>
                        <span>je m'appelle </span></p>
                </div>
                <h1 class="text-8xl font-quicksand text-center w-fit pl-20">
                    <span>Inácio</span>
                    <span>Rodrigues</span>
                </h1>
                <div class="pl-20 text-xl">
                    <p>Développeur web / mobile full-stack en recherche d'alternance</p>
                </div>
            </div>
            <div x-data="{ isHovered: false }" class="pl-20">
                <div
                    class="relative px-6 py-2 w-fit overflow-hidden group bg-blue-primary-color"
                    @mouseenter="isHovered = true"
                    @mouseleave="isHovered = false"
                >
                    <div
                        class="absolute inset-0 bg-blue-fifth-color transform -translate-x-full transition-transform duration-500 group-hover:translate-x-0"
                    ></div>

                    <a
                        class="relative z-10 text-2xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                        href="#a_propos"
                    >
                        Me découvrir
                    </a>
                </div>
            </div>

            <!--
            <p>
                Actuellement titulaire d'un baccalauréat STI2D (Sciences et
                Technologies de l'Industrie et du Développement Durable), je poursuis
                mes études à l'IUT de Haguenau dans la filière MMI (Métiers du
                Multimédia et de l'Internet) en vue d'obtenir mon diplôme de niveau
                BAC +3. Je suis actuellement à la recherche d'un stage de 10 semaines,
                ainsi que d'une alternance d'une durée d'un an ou d'un an et demi.
            </p>-->
        </div>
        <livewire:social-links/>
    </header>
    <section class="flex px-28 justify-between items-center">
        <livewire:projects-count/>
    </section>
    <section class="px-4 py-8 bg-blue-fifth-color flex flex-col items-center">
        <h2 class="text-3xl font-bold text-center mb-6">Mes Projets</h2>

        <div class="container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($projectRandom as $project)
                <div
                    class="bg-blue-sixth-color shadow-lg rounded-lg overflow-hidden transition duration-300 transform hover:scale-105">
                    <img src="{{ asset('storage/' . $project->image_visuel) }}" alt="{{ $project->name }}"
                         class="w-full h-48 object-cover object-top">


                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ $project->name }}</h3>

                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($project->description, 100) }}</p>

                        <div class="flex flex-wrap mt-3">
                            @foreach ($project->languages as $language)
                                <span
                                    class="bg-blue-seventh-color text-black text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                {{ $language->name }}
                            </span>
                            @endforeach
                        </div>

                        <div class="mt-4 flex justify-between items-center">
                            <div class="flex space-x-4">
                                <a href="{{ $project->url_git }}" target="_blank"
                                   class="text-gray-700 hover:text-gray-900 flex items-center">
                                    <svg class="w-5 h-5 mr-1 text-gray-600 hover:text-black transition"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12 0C5.37 0 0 5.373 0 12c0 5.303 3.438 9.8 8.207 11.385.6.113.793-.26.793-.577 0-.285-.01-1.04-.015-2.04-3.34.727-4.042-1.61-4.042-1.61-.547-1.385-1.335-1.755-1.335-1.755-1.09-.743.083-.728.083-.728 1.207.084 1.842 1.24 1.842 1.24 1.07 1.83 2.807 1.3 3.49.994.107-.774.42-1.3.76-1.6-2.665-.3-5.467-1.332-5.467-5.93 0-1.312.467-2.39 1.237-3.23-.125-.3-.535-1.515.115-3.155 0 0 1.01-.322 3.3 1.23a11.56 11.56 0 0 1 3-.403c1.02.005 2.04.138 3 .403 2.29-1.553 3.3-1.23 3.3-1.23.65 1.64.24 2.855.12 3.155.77.84 1.23 1.92 1.23 3.23 0 4.61-2.81 5.62-5.48 5.91.43.37.81 1.1.81 2.22 0 1.6-.015 2.89-.015 3.28 0 .32.19.69.8.57C20.57 21.8 24 17.3 24 12c0-6.627-5.37-12-12-12z"/>
                                    </svg>
                                    GitHub
                                </a>
                                <a href="{{ $project->url_site }}" target="_blank"
                                   class="text-gray-700 hover:text-gray-900 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor"
                                         class="w-5 h-5 mr-1 text-gray-600 hover:text-black transition">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418"/>
                                    </svg>

                                    Site internet
                                </a>
                            </div>

                            <x-link.link href="{{route('project.show', ['project' => $project])}}"
                                         name="Voir le projet"/>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="py-8 flex flex-col items-center">
        <h2 class="text-3xl font-bold text-center mb-6">Mon parcours scolaire</h2>

        <div x-data="{ isHovered: false }"
             @mouseenter="isHovered = true"
             @mouseleave="isHovered = false"
             class="relative w-full px-8 overflow-hidden">

            <div id="timeline" class="flex gap-4 overflow-x-auto scroll-smooth cursor-grab hide-scrollbar">
                @foreach($timelines as $timeline)
                    <div class="w-1/4 flex-shrink-0 flex flex-col space-x-4 timeline-item">
                        <div class="flex items-center">
                            <div class="w-1/4 rounded-l-full h-2 bg-blue-fifth-color"></div>
                            <div class="w-8 h-8 rounded-full bg-blue-fifth-color flex justify-center items-center p-4">
                                <i class="bi bi-briefcase text-lg text-white"></i>
                            </div>
                            <div class="w-full rounded-r-full h-2 bg-blue-fifth-color"></div>
                        </div>
                        <div class="mt-4 bg-blue-sixth-color text-center rounded-2xl px-4 py-6 sm:pe-8">
                            <h4 class="font-bold text-xl">{{$timeline->title}}</h4>
                            <p>({{$timeline->date}})</p>
                            <p class="text-left">{{$timeline->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="compétences" class="bg-blue-secondary-color flex justify-center items-center flex-col py-8"
         x-data="{ active: 1 }">
        <div class="container">
            <div>
                <h2 class="text-3xl font-bold text-center mb-6">Mes Compétences</h2>
                <div class="bg-blue-seventh-color rounded-lg p-4 w-fit mx-auto">
                    <ul class="list-none p-0 text-center flex space-x-6 justify-center items-center">
                        @foreach($languageTypes as $languageType)
                            <li @click="active = {{ $loop->index + 1 }}"
                                :class="{ 'bg-blue-fifth-color text-white p-2 rounded-lg': active === {{ $loop->index + 1 }} }"
                                class="cursor-pointer text-sm">{{ $languageType->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            @foreach($languageTypes as $languageType)
                <div x-show="active === {{ $loop->index + 1 }}"
                     class="mt-6 grid grid-cols-5 place-items-center gap-12 w-fit mx-auto"
                     :class="{ 'opacity-100': active === {{ $loop->index + 1 }} }">

                    @foreach($languages->where('language_type_id', $languageType->id) as $language)
                        <div
                            class="w-32 flex flex-col justify-center items-center space-y-[-20px]">
                            <img class="w-24" src="{{ asset('storage/' . $language->logo_language) }}"
                                 alt="{{ $language->name }}">
                            <div class="flex flex-col justify-center items-center">
                                <div
                                    class="w-0 h-0 border-l-[30px] border-r-[30px] border-t-[30px] border-t-transparent border-l-transparent border-r-transparent border-b-[20px] border-b-blue-sixth-color">
                                </div>
                                <div
                                    class="bg-blue-sixth-color text-center py-3 px-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                    <p class="font-extrabold text-lg">{{ $language->name }}</p>
                                    @if($language->originLanguages->isNotEmpty())
                                        <p class="text-xs text-gray-500">
                                            Appris en
                                            @foreach($language->originLanguages as $origin)
                                                {{ $origin->name }}{{ !$loop->last ? ', ' : '' }}
                                            @endforeach
                                        </p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
    <section id="a_propos" class="bg-blue-sixth-color py-12">
        <div class="container mx-auto px-6 lg:px-20 flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 flex justify-center mb-6 lg:mb-0">
                <div class="relative w-64 h-64 rounded-full overflow-hidden shadow-lg border-4 border-blue-seventh-color">
                    <img src="{{ asset('img/photo-face.png') }}" alt="Photo de moi" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-20 hover:bg-opacity-40 transition-all duration-300"></div>
                </div>
            </div>

            <div class="lg:w-1/2 text-center lg:text-left">
                <h2 class="text-4xl font-bold text-blue-fifth-color mb-4">À propos de moi</h2>
                <p class="text-blue-third-color leading-relaxed mb-6">
                    Ayant toujours été plongé dans l'informatique grâce à mon père,
                    j’ai découvert le développement web au lycée, puis au cours de ma formation en
                    <span class="font-semibold text-blue-fifth-color">BUT MMI</span>.
                    C’est là que s’est révélée ma passion pour ce domaine fascinant.
                    <br><br>
                    J’ai toujours voulu comprendre comment était conçu un site internet, et aujourd’hui,
                    <span class="font-semibold text-blue-fifth-color">j’adore en créer</span>.
                    Les projets que j’ai réalisés durant ma formation témoignent de mon évolution,
                    et je suis fier du chemin parcouru.
                    <br><br>
                    Dans la continuité de mon parcours, je vais intégrer
                    <span class="font-semibold text-blue-fifth-color">Ynov Strasbourg</span>
                    pour un Mastère et je suis actuellement à la recherche d’une **entreprise**
                    prête à me faire confiance en alternance.
                    Motivé et déterminé, je suis prêt à démontrer mes compétences et à apprendre encore plus
                    aux côtés d’une équipe passionnée !
                </p>
                <a href="#" class="bg-blue-seventh-color text-white px-6 py-3 rounded-lg shadow-md
            hover:bg-blue-fourth-color transition-all duration-300">
                    Télécharger mon CV
                </a>
            </div>
        </div>
    </section>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const timeline = document.getElementById("timeline");
            const items = document.querySelectorAll(".timeline-item");
            let itemWidth = items[0].offsetWidth + 16;
            let currentIndex = 0;

            function scrollToIndex(index) {
                gsap.to(timeline, {scrollLeft: index * itemWidth, duration: 0.5, ease: "power2.out"});
            }

            timeline.addEventListener("wheel", (e) => {
                e.preventDefault();
                if (e.deltaY > 0) {
                    currentIndex = Math.min(currentIndex + 1, items.length - 1);
                } else {
                    currentIndex = Math.max(currentIndex - 1, 0);
                }
                scrollToIndex(currentIndex);
            });

            function autoScroll() {
                currentIndex = (currentIndex + 1) % items.length;
                scrollToIndex(currentIndex);
            }

            let autoScrollInterval = setInterval(autoScroll, 3000);

            timeline.addEventListener("mouseenter", () => clearInterval(autoScrollInterval));
            timeline.addEventListener("mouseleave", () => autoScrollInterval = setInterval(autoScroll, 3000));
        });
    </script>

</x-layout.main>
