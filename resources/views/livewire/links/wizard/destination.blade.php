<div class="flex flex-col pt-5 lg:pt-8 gap-y-5 lg:gap-y-8">

    <x-steps :steps="$steps" />

    <div class="text-center w-full lg:w-2/3 xl:w-1/2 mx-auto">
        <h2 class="text-xl font-bold mb-2">Destination</h2>
        <p class="text-base font-medium">Fill in the URL for the page you wish the link to go to.</p>
    </div>

    <div class="mx-auto w-full lg:w-2/3 xl:w-1/2 transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 transition-all">
        <div class="relative">
            <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
            </svg>              
            <input required type="text" wire:model.defer="destination" name="destination" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0" placeholder="https://{{ $domain['domain'] }}/page">
        </div>
    </div>

    @error('destination') <div class="text-red-500 text-center">{{ $message }}</div> @enderror

    <div class="flex justify-center">
        <x-button type="button" wire:click="validateDestination" class="items-center">
            <span class="text-lg px-4">Next</span>
            <svg wire:loading class="animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </x-button>
    </div>

</div>