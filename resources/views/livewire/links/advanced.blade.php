<div>

    <div class="py-8 grid sm:grid-cols-2 gap-5 lg:gap-10 divide-gray-600">

        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Destination URLs </h3>
                <p class="mt-1 text-sm text-gray-500">Paste in a list of links here and they'll be processed, ready for you to attribute on the right hand side.</p>
              </div>
            <div class="px-4 py-5 sm:p-6">

                <div class="mb-4" x-data="{ presetsOpen: false }">
                    <div><a @click.prevent="presetsOpen = !presetsOpen" rel="nofollow" class="cursor-pointer text-gray-900 font-semibold text-sm">Presets &raquo;</a></div>
                    <div x-cloak x-show="presetsOpen" class="my-5 grid grid-cols-3 gap-y-2 gap-x-5">
                        
                        <div class="text-sm">
                            <x-label>Source</x-label>
                            <div class="mt-2">
                                <x-input type="text" name="preset_utm_source" wire:model="presetSource" />
                            </div>
                        </div>

                        <div class="text-sm">
                            <x-label>Medium</x-label>
                            <div class="mt-2">
                                <x-input type="text" name="preset_utm_medium" wire:model="presetMedium" />
                            </div>
                        </div>
                        
                        <div class="text-sm">
                            <x-label>Campaign</x-label>
                            <div class="mt-2">
                                <x-input type="text" name="preset_utm_campaign" wire:model="presetCampaign" />
                            </div>
                        </div>
                    </div>
                </div>

                <x-textarea rows="10" wire:model="destinations" class="w-full h-full" placeholder="Paste your links here. One link per line."></x-textarea>
            </div>
        </div>
          
        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Job Postings</h3>
                <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit quam corrupti consectetur.</p>
              </div>
            <div class="px-4 py-5 sm:p-6">
              @foreach($this->formattedDestinations as $url)
                <div class="bg-gray-100 py-2 px-2 rounded-md shadow-sm my-2">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-900 text-sm">{{ $url }}</span>
                        <span>
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                              </svg>
                        </span>                              
                    </div>
                </div>

              @endforeach
            </div>
        </div>

    </div>

    advanced view
</div>