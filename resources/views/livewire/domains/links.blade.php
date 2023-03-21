<div class="flex flex-col space-y-5 mt-8" x-data="LinksTable()">
    <div class="flex items-center flex-end gap-3">
        <x-button @click.prevent="filterOpen = !filterOpen" type="button">
            <svg class="text-white w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
            </svg>
            <span>
                Filter 
                @if($filterCount > 0)
                    <span class="ml-2 bg-white text-blue-700 rounded-full px-[6px] text-xs inline-block">
                        {{ $filterCount }}
                    </span>
                @endif
            </span>       
        </x-button>
        @if($filterCount > 0)
            <a class="font-medium text-blue-600 hover:text-blue-500" href="#" wire:click.prevent="resetFilters()">Clear</a>
        @endif
    </div>
    <div class="flex items-end text-sm bg-gray-50 rounded-lg border border-gray-300 gap-5 p-4" x-show="filterOpen">
        <div>
            <x-label class="font-semibold">Source</x-label>
            <x-select wire:model="activeUtmSourceFilter">
                <option value="">All</option>
                @foreach($utmSourceFilters as $filter)
                    <option value="{{ $filter->utm_source }}">{{ $filter->utm_source }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="pl-3">
            <x-label class="font-semibold">Medium</x-label>
            <x-select wire:model="activeUtmMediumFilter">
                <option value="">All</option>
                @foreach($utmMediumFilters as $filter)
                    <option value="{{ $filter->utm_medium }}">{{ $filter->utm_medium }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="pl-3">
            <x-label class="font-semibold">Campaign</x-label>
            <x-select wire:model="activeUtmCampaignFilter">
                <option value="">All</option>
                @foreach($utmCampaignFilters as $filter)
                    <option value="{{ $filter->utm_campaign }}">{{ $filter->utm_campaign }}</option>
                @endforeach
            </x-select>
        </div>
        <div wire:loading class="flex justify-end items-end">
            
            <svg class="animate-spin inline-block -mt-5 h-5 w-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>

        </div>
    </div>
    
    <x-table>
        <x-slot name="head">
            <x-table.heading>Destination</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('utm_source')"  :direction="$sortField === 'source' ? $sortDirection : null">Source</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('utm_medium')"  :direction="$sortField === 'medium' ? $sortDirection : null">Medium</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('utm_campaign')"  :direction="$sortField === 'campaign' ? $sortDirection : null">Campaign</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created' ? $sortDirection : null">Created</x-table.heading>
            <x-table.heading class="flex-end"></x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach($links as $link)
                <x-table.row>
                    <x-table.cell>{{ $link->destination }}</x-table.cell>
                    <x-table.cell><span class="underline decoration-dotted decoration-blue-200 cursor-pointer" wire:click="setActiveUtmSourceFilter('{{ $link->utm_source }}')">{{ $link->utm_source }}</span></x-table.cell>
                    <x-table.cell><span class="underline decoration-dotted decoration-blue-200 cursor-pointer" wire:click="setActiveUtmMediumFilter('{{ $link->utm_medium }}')">{{ $link->utm_medium }}</span></x-table.cell>
                    <x-table.cell><span class="underline decoration-dotted decoration-blue-200 cursor-pointer" wire:click="setActiveUtmCampaignFilter('{{ $link->utm_campaign }}')">{{ $link->utm_campaign }}</span></x-table.cell>
                    <x-table.cell>{{ $link->created_at }}</x-table.cell>
                    <x-table.cell class="justify-end text-right">

                        <x-button-secondary type="button" @click.prevent="openLink({{ json_encode($link) }})" class="text-xs">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>  
                            View
                        </x-button-secondary>

                        <x-button type="button" x-data="{ copied: false }" class="text-xs" @click.prevent="window.navigator.clipboard.writeText('{{ $link->full_url }}'); copied = true; setTimeout( function() { copied = false }, 3000);">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-white-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                            </svg>
                            <span x-show="!copied">Copy</span>
                            <span x-show="copied">Copied!</span>
                        </x-button>


                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>

    <div>
        {{ $links->links() }}
    </div>



    <div x-show="linkOpen" x-cloak class="relative z-10" role="dialog" aria-modal="true">

        <div x-show="linkOpen" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            x-transition:enter="ease-in-out duration-500" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            x-transition:leave="ease-in-out duration-500" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0" >
        </div>
      
        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div @click.away="closeLink()" x-show="linkOpen" class="pointer-events-auto w-screen max-w-md transition"
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
                        x-transition:enter-start="translate-x-full" 
                        x-transition:enter-end="translate-x-0" 
                        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" 
                        x-transition:leave-start="translate-x-0" 
                        x-transition:leave-end="translate-x-full">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
                            <div class="px-4 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">Link details</h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button @click="closeLink()" type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                    <dl class="sm:divide-y sm:divide-gray-200">
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Desination</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <a class="underline decoration-dotted" :href="link.destination ?? '#'" target="_blank" rel="noopener nofollow" x-text="link.destination"></a>
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Source</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0" x-text="link.utm_source ?? 'empty'">
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Medium</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0" x-text="link.utm_medium ?? 'empty'">
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Campaign</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0" x-text="link.utm_campaign ?? 'empty'">
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Term</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0" x-text="link.utm_term ?? 'empty'">
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Content</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0" x-text="link.utm_content ?? 'empty'">
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Notes</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                -todo add notes field
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">URL</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <x-button type="button" x-data="{ copied: false }" class="text-xs" @click.prevent="window.navigator.clipboard.writeText('{{ $link->full_url }}'); copied = true; setTimeout( function() { copied = false }, 3000);">
                                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-white-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                                    </svg>
                                                    <span x-show="!copied">Copy</span>
                                                    <span x-show="copied">Copied!</span>
                                                </x-button>
                                            </dd>
                                        </div>
                                    </dl>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


</div>
<script>
    window.LinksTable = () => {
        return {
            filterOpen: false,
            linkOpen: false,
            link: {
                id: 0,
                destination: '',
                utm_source: '',
                utm_medium: '',
                utm_campaign: '',
                utm_term: '',
                utm_content: '',
                notes: '',
                full_url: '',
            },
            openLink( linkData ) {
                this.link = linkData;
                this.linkOpen = true;
            },
            closeLink() {
                this.linkOpen = false;
            }
        }
    }
</script>