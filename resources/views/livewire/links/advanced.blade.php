<div>

    <div class="py-8 grid sm:grid-cols-2 gap-5 lg:gap-10 divide-gray-600">

        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Destination URLs </h3>
                <p class="mt-1 text-sm text-gray-500">Paste in a list of links here and they'll be processed, ready for you to attribute on the right hand side. Click the "Presets" link to automatically attribute your pasted URLs.</p>
              </div>
            <div class="px-4 py-5 sm:p-6" x-data="{ presetsOpen: false }">

                <div class="flex justify-between items-center mb-4">
                        <div><a @click.prevent="presetsOpen = !presetsOpen" rel="nofollow" class="cursor-pointer text-gray-900 font-semibold text-sm">Presets &raquo;</a></div>
                        <x-button wire:click.prevent="loadDestinations">
                            <span>Submit</span>
                            <svg wire:loading class="ml-2 animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </x-button>
                </div>

                <div x-cloak x-show="presetsOpen" class="bg-gray-100 p-3 rounded-md mb-4 mt-2 border border-gray-200 grid grid-cols-3 gap-y-2 gap-x-5">
                        
                    <div class="text-sm">
                        <x-label>Source</x-label>
                        <div class="mt-1">
                            <x-input type="text" name="presetSource" wire:model.defer="presetSource" />
                        </div>
                    </div>

                    <div class="text-sm">
                        <x-label>Medium</x-label>
                        <div class="mt-1">
                            <x-input type="text" name="presetMedium" wire:model.defer="presetMedium" />
                        </div>
                    </div>
                    
                    <div class="text-sm">
                        <x-label>Campaign</x-label>
                        <div class="mt-1">
                            <x-input type="text" name="presetCampaign" wire:model.defer="presetCampaign" />
                        </div>
                    </div>
                </div>

                <x-textarea rows="10" wire:model.defer="destinations" class="w-full h-full" placeholder="Paste your links here. One link per line."></x-textarea>
            </div>
        </div>
          
        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Your Attributable Links</h3>
                <p class="mt-1 text-sm text-gray-500">Below is a list of your processed links ready for attribution. This will only be populated once you've submitted your destination URL list.</p>
              </div>
            <div class="px-4 py-5 sm:p-6 relative">
                @if($errorMessage) <div class="text-red-500 font-semibold text-sm">{{ $errorMessage }}</div> @endif
                @if(!empty($this->destinationsLoaded))
                    <div class="my-2 flex justify-end">
                        <x-button wire:click.prevent="importLinks" type="button">Create links</x-button>
                    </div>
                @endif
                @foreach($this->destinationsLoaded as $link)
                    <div class="bg-gray-100 py-2 px-2 rounded-md shadow-sm my-2" x-data="{ open: false }">
                        <div @click="open = !open" class="cursor-pointer flex justify-between items-center">
                            <span class="text-gray-900 text-sm">{{ $link['destination'] }}</span>
                            <span>
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </span>                              
                        </div>
                        <div x-cloak x-show="open">
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>