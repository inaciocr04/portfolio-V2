<div>
    <!-- Affichage des liens actuels -->
    <div class="flex items-center space-x-16">
        <img src="{{ asset('img/photo-profile2.png') }}" alt="ordinateur" class="w-[400px] rot">
        <div class="flex flex-col space-y-4 items-center text-white">
            <div class="h-32 rounded w-1 bg-blue-fifth-color"></div>

            <div
                class="text-blue-fifth-color w-10 flex justify-center items-center h-10 rounded-full size-6 hover:text-white hover:transition-all transition-all">
                <a href="{{ $linkedinLink }}" target="_blank">
                    <i class="bi bi-linkedin text-2xl"></i>
                </a>
            </div>

            <div
                class="text-blue-fifth-color w-10 flex justify-center items-center h-10 rounded-full size-6 hover:text-white hover:transition-all transition-all">
                <a href="{{ $githubLink }}" target="_blank">
                    <i class="bi bi-github text-2xl"></i>
                </a>
            </div>

            <div
                class="text-blue-fifth-color w-10 flex justify-center items-center h-10 rounded-full size-6 hover:text-white hover:transition-all transition-all">
                <a href="{{ $instagramLink }}" target="_blank">
                    <i class="bi bi-instagram text-2xl"></i>
                </a>
            </div>
            <div
                class="text-blue-fifth-color w-10 flex justify-center items-center h-10 rounded-full size-6 hover:text-white hover:transition-all transition-all">
                <a href="{{ $cvLink }}" target="_blank">
                    <i class="bi bi-file-earmark-arrow-down text-2xl"></i>
                </a>
            </div>

            <div class="h-32 rounded w-1 bg-blue-fifth-color"></div>
            @auth
                <button wire:click="toggleForm" class="mt-4 bg-blue-fifth-color  text-white p-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                    </svg>
                </button>
            @endauth
        </div>
    </div>

    @if ($showForm)
        <div class="mt-4 p-6 border rounded">
            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="github" class="text-white">GitHub</label>
                    <input type="url" id="github" wire:model="githubLink" class="border p-2 rounded text-black w-full"
                           placeholder="https://github.com/tonprofil">
                </div>
                <div class="mb-4">
                    <label for="linkedin" class="text-white">LinkedIn</label>
                    <input type="url" id="linkedin" wire:model="linkedinLink"
                           class="border p-2 rounded text-black w-full" placeholder="https://linkedin.com/in/tonprofil">
                </div>
                <div class="mb-4">
                    <label for="instagram" class="text-white">Instagram</label>
                    <input type="url" id="instagram" wire:model="instagramLink"
                           class="border p-2 rounded text-black w-full" placeholder="https://instagram.com/toncompte">
                </div>
                <div class="mb-4">
                    <label for="cv" class="text-white">CV</label>
                    <input type="url" id="cv" wire:model="cvLink"
                           class="border p-2 rounded text-black w-full" placeholder="lien du cv">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">
                    Enregistrer
                </button>
            </form>
        </div>
    @endif

    <!-- Message de confirmation -->
    @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif
</div>
