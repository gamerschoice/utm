<div>    
    <div class="flex flex-col space-y-5 mt-8" x-data="LinksTable()">
        <div class="flex gap-5 justify-between items-center">
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
                <x-button-secondary wire:click="$refresh" wire:loading.attr="disabled">
                    <span wire:loading.class="animate-spin" wire:target="$refresh">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>                      
                    </span>
                </x-button-secondary>
                @if($filterCount > 0)
                    <a class="font-medium text-blue-600 hover:text-blue-500" href="#" wire:click.prevent="resetFilters()">Clear</a>
                @endif
            </div>
            <div class="flex items-center flex-end gap-3">
                @livewire('links.export')
                <a href="{{ route('link.create', $domain) }}">
                    <x-button class="text-lg">                 
                        <span class="hidden md:inline">Create a&nbsp;</span>New Link
                    </x-button>
                </a>
            </div>
        </div>
        <div x-show="filterOpen" x-cloak class="flex items-end text-sm bg-gray-50 rounded-lg border border-gray-300 gap-5 p-4">
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
        
        <x-modal-danger wire:model="confirmingBulkDelete">
            <x-slot name="title">
                {{ __('Delete links') }}
            </x-slot>
            <x-slot name="content">
                {{ __('Are you sure you want to remove these links?') }}
            </x-slot>
            <x-slot name="footer">
                <x-button-secondary wire:click="$toggle('confirmingBulkDelete')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-button-secondary>
                <x-button-danger @click="deletions = []; bulkDeletions = false" class="ml-3" wire:click="bulkDelete" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-button-danger>
            </x-slot>
        </x-modal-danger>

        <x-table>
            <x-slot name="head">
                <x-table.heading class="flex justify-center">
                    <button wire:click="$toggle('confirmingBulkDelete')" x-bind:class="{ 'bg-red-600 text-white hover:bg-red-500' : deletions.length, 'bg-white text-gray-900 ring-gray-300 hover:bg-gray-50 ring-1 ring-inset' : deletions.length === 0 }" class="px-3 py-2 text-sm font-semibold inline-flex items-center rounded-md shadow-sm transition ease-in-out duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>                      
                    </button>
                </x-table.heading>
                <x-table.heading>Destination</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('utm_source')"  :direction="$sortField === 'source' ? $sortDirection : null">Source</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('utm_medium')"  :direction="$sortField === 'medium' ? $sortDirection : null">Medium</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('utm_campaign')"  :direction="$sortField === 'campaign' ? $sortDirection : null">Campaign</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created' ? $sortDirection : null">Created</x-table.heading>
                <x-table.heading class="flex-end"></x-table.heading>
            </x-slot>

            <x-slot name="body">
                @if($links->isEmpty())
                    <x-table.row>
                        <x-table.cell colspan="7">
                            <div class="relative block w-full h-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                                </svg>  
                                <span class="mt-2 block text-base font-semibold text-gray-900">No links found</span>
                                <span class="text-sm mt-1 font-medium text-gray-500 mx-auto sm:w-2/3 block">Use our <a href="{{ route('link.create', $domain) }}" class="font-semibold underline text-gray-900">wizard</a> or <a href="{{ route('link.advanced', $domain) }}" class="font-semibold underline text-gray-900">bulk import</a> tool to create your links.</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endif
                @foreach($links as $link)
                    <x-table.row>
                        <x-table.cell>
                            <div class="flex w-full h-full justify-center items-end">
                                <x-checkbox x-model="deletions" wire:model.defer="deletions" value="{{ $link->id }}"></x-checkbox>
                            </div>
                        </x-table.cell>
                        <x-table.cell>{{ $link->destination }}</x-table.cell>
                        <x-table.cell><span class="underline decoration-dotted decoration-blue-200 cursor-pointer" wire:click="setActiveUtmSourceFilter('{{ $link->utm_source }}')">{{ $link->utm_source }}</span></x-table.cell>
                        <x-table.cell><span class="underline decoration-dotted decoration-blue-200 cursor-pointer" wire:click="setActiveUtmMediumFilter('{{ $link->utm_medium }}')">{{ $link->utm_medium }}</span></x-table.cell>
                        <x-table.cell><span class="underline decoration-dotted decoration-blue-200 cursor-pointer" wire:click="setActiveUtmCampaignFilter('{{ $link->utm_campaign }}')">{{ $link->utm_campaign }}</span></x-table.cell>
                        <x-table.cell>{{ $link->created_ago }}</x-table.cell>
                        <x-table.cell class="justify-end text-right">

                            <x-button-secondary type="button" wire:click="showLink({{ $link->id }})" class="text-xs">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-gray-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>  
                                View
                            </x-button-secondary>

                            <x-button type="button" x-data="{ copied: false }" class="text-xs" @click.prevent="window.navigator.clipboard.writeText('{{ $link->auto_url }}'); copied = true; setTimeout( function() { copied = false }, 3000);">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-white-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                </svg>
                                <span x-show="!copied">Copy</span>
                                <span x-cloak x-show="copied">Copied!</span>
                            </x-button>


                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        <div>
            {{ $links->links() }}
        </div>


        @livewire('links.link-panel')

    </div>
    <script>
        window.LinksTable = () => {
            return {
                filterOpen: false,
                bulkDeletions: false,
                deletions: [],
            }
        }
    </script>
</div>