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
                            <svg wire:loading wire:target="loadDestinations" class="ml-2 animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
          
        <div class="overflow-hidden rounded-lg bg-white shadow flex flex-col">
            <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Your Attributable Links</h3>
                <p class="mt-1 text-sm text-gray-500">Below is a list of your processed links ready for attribution. This will only be populated once you've submitted your destination URL list.</p>
              </div>
            <div class="px-4 py-5 sm:p-6 relative flex flex-col h-full">
                @if($errorMessage)
                    <div class="border-l-4 border-red-400 bg-red-50 p-4 mb-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">
                                    {{ $errorMessage }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(!empty($this->destinationsLoaded))
                    <div class="mb-4 flex justify-end">
                        <x-button wire:click.prevent="importLinks" wire:loading.attr="disabled" type="button">
                            <span>Create links</span>
                            <svg wire:loading wire:target="importLinks" class="ml-2 animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </x-button>
                    </div>
                @else 

                    <div class="relative block w-full h-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                        </svg>  
                        <span class="mt-2 block text-base font-semibold text-gray-900">No links processed</span>
                        <span class="text-sm font-medium text-gray-500 mx-auto sm:w-2/3 block">Please paste your URLs into the Destination URLs text area and click Submit</span>
                    </div>

                @endif
                @foreach($this->destinationsLoaded as $index => $link)
                    <div class="bg-gray-100 py-3 px-3 rounded-md shadow-sm my-2" x-data="{ open: false }">
                        <div @click="open = !open" class="cursor-pointer flex justify-between items-center">
                            <span class="text-gray-900 text-sm font-medium">{{ $link['destination'] }}</span>
                            <span>
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </span>                              
                        </div>
                        <div x-cloak x-show="open" class="border-t border-gray-300 mt-3 pt-3">
                            <div class="grid sm:grid-cols-2 gap-x-4 gap-y-2">
                                <div class="text-sm">
                                    <x-label class="text-xs">Source</x-label>
                                    <div class="mt-1">
                                        <x-input type="text" wire:model.defer="destinationsLoaded.{{ $index }}.utm_source" />
                                    </div>
                                </div>
            
                                <div class="text-sm">
                                    <x-label class="text-xs">Medium</x-label>
                                    <div class="mt-1">
                                        <x-input type="text" wire:model.defer="destinationsLoaded.{{ $index }}.utm_medium" />
                                    </div>
                                </div>
                                
                                <div class="text-sm">
                                    <x-label class="text-xs">Campaign</x-label>
                                    <div class="mt-1">
                                        <x-input type="text" wire:model.defer="destinationsLoaded.{{ $index }}.utm_campaign" />
                                    </div>
                                </div>

                                <div class="text-sm">
                                    <x-label class="text-xs">Term</x-label>
                                    <div class="mt-1">
                                        <x-input type="text" wire:model.defer="destinationsLoaded.{{ $index }}.utm_term" />
                                    </div>
                                </div>

                                <div class="text-sm">
                                    <x-label class="text-xs">Content</x-label>
                                    <div class="mt-1">
                                        <x-input type="text" wire:model.defer="destinationsLoaded.{{ $index }}.utm_content" />
                                    </div>
                                </div>

                                <div class="text-sm">
                                    <x-label class="text-xs">Source platform</x-label>
                                    <div class="mt-1">
                                        <x-input type="text" wire:model.defer="destinationsLoaded.{{ $index }}.utm_source_platform" />
                                    </div>
                                </div>

                                <div class="text-sm">
                                    <x-label class="text-xs">Creative format</x-label>
                                    <div class="mt-1">
                                        <x-input type="text" wire:model.defer="destinationsLoaded.{{ $index }}.utm_creative_format" />
                                    </div>
                                </div>

                                <div class="text-sm">
                                    <x-label class="text-xs">Marketing tactic</x-label>
                                    <div class="mt-1">
                                        <x-input type="text" wire:model.defer="destinationsLoaded.{{ $index }}.utm_marketing_tactic" />
                                    </div>
                                </div>

                                <div class="text-sm col-span-2">
                                    <x-label class="text-xs">Notes</x-label>
                                    <div class="mt-1">
                                        <x-textarea type="text" wire:model.defer="destinationsLoaded.{{ $index }}.notes"></x-textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>