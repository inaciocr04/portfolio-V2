<x-layout.main>
    <header class="flex justify-around p-16 items-center bg-blue-secondary-color">
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
                    <p>Développeur web et mobile full-stack</p>
                </div>
            </div>
            <div x-data="{ isHovered: false }" class="pl-20">
                <div
                    class="relative px-6 py-2 w-fit overflow-hidden group bg-blue-primary-color"
                    @mouseenter="isHovered = true"
                    @mouseleave="isHovered = false"
                >
                    <!-- Div animée (fond qui se déplace de la gauche vers la droite) -->
                    <div
                        class="absolute inset-0 bg-blue-fifth-color transform -translate-x-full transition-transform duration-500 group-hover:translate-x-0"
                    ></div>

                    <!-- Texte qui reste au-dessus -->
                    <a
                        class="relative z-10 text-2xl font-bold text-black transition-colors duration-500 group-hover:text-white"
                        href=""
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
        <div class="flex items-center space-x-16">
            <img src="{{ asset('img/photo-moi.png') }}" alt="ordinateur" class="w-90">
            <div class="flex flex-col space-y-4 items-center text-white">
                <div class="h-40 rounded w-1 bg-blue-fifth-color">

                </div>
                <div class="text-blue-fifth-color w-10 flex justify-center items-center h-10 rounded-full size-6">
                    <i class="bi bi-linkedin text-2xl"></i>
                </div>
                <div class="text-blue-fifth-color w-10 flex justify-center items-center h-10  rounded-full size-6">
                    <i class="bi bi-github text-2xl"></i>
                </div>
                <div class="text-blue-fifth-color w-10 flex justify-center items-center h-10 rounded-full size-6">
                    <i class="bi bi-instagram text-2xl"></i>
                </div>
                <div class="h-40 rounded w-1 bg-blue-fifth-color">

                </div>
            </div>
        </div>
    </header>
    <div class="flex bg-blue-fourth-color px-28 justify-between items-center border-black border-2 ">
        <livewire:projects-count/>
    </div>
</x-layout.main>
