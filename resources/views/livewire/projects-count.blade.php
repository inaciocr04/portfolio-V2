<div class="flex flex-1 px-28 justify-between items-center">
    <div wire:poll.5000ms class="flex flex-1 px-28 justify-between items-center">
        <div class="flex-1 flex justify-center">
            <div class="flex items-center w-fit text-center px-3 py-6 space-x-4">
                <p class="text-8xl font-bold text-blue-secondary-color">{{ $projectsFinishCount }}</p>
                <div class="text-xl font-semibold text-white flex flex-col items-start">
                    <p>Projets</p>
                    <p>terminés</p>
                </div>
            </div>
        </div>
        <div class="flex-1 flex justify-center">
            <div class="flex items-center w-fit text-center px-3 py-6 space-x-4">
                <p class="text-8xl text-blue-secondary-color font-bold">{{ $projectsInProgressCount }}</p>
                <div class="text-xl font-semibold text-white flex flex-col items-start">
                    <p>Projets</p>
                    <p>en cours</p>
                </div>
            </div>
        </div>
        <div class="flex-1 flex justify-center">
            <div class="flex items-center w-fit text-center px-3 py-6 space-x-4">
                <p class="text-8xl font-bold text-blue-secondary-color">{{ $yearsOftraining }}</p>
                <div class="text-xl font-semibold text-white flex flex-col items-start">
                    <p>Années de</p>
                    <p>formation</p>
                </div>
            </div>
        </div>
        <div class="flex-1 flex justify-center">
            <div class="flex items-center w-fit text-center px-3 py-6 space-x-4">
                <p class="text-8xl font-bold text-blue-secondary-color">{{ $yearsOfExperience }}</p>
                <div class="text-xl font-semibold text-white flex flex-col items-start">
                    <p>Années</p>
                    <p>d'expérience</p>
                </div>
            </div>
        </div>
        @auth
            <div class="text-center mt-4">
                <button wire:click="toggleForm"  class="mt-4 bg-blue-fifth-color  text-white p-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                    </svg>
                </button>
            </div>
        @endauth
    </div>

    @if($showForm)
        <div class="mt-6 p-4 bg-gray-800 rounded-lg">
            <form wire:submit.prevent="save">
                <div class="flex gap-4">
                    <div>
                        <label class="text-white">Années de formation :</label>
                        <input type="number" wire:model="yearsOftraining" class="border p-2 rounded text-black">
                    </div>
                    <div>
                        <label class="text-white">Années d'expérience :</label>
                        <input type="number" wire:model="yearsOfExperience" class="border p-2 rounded text-black">
                    </div>
                </div>
                <div class="mt-4 flex gap-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Enregistrer</button>
                    <button type="button" wire:click="toggleForm" class="bg-red-500 text-white px-4 py-2 rounded">
                        Annuler
                    </button>
                </div>
            </form>

            @if (session()->has('message'))
                <p class="text-green-500 mt-2">{{ session('message') }}</p>
            @endif
        </div>
    @endif
</div>
