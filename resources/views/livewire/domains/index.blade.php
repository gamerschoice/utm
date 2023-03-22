<div>
    <div class="flex flex-col space-y-5 mt-8" x-data="DomainsTable()">
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('domain')">Domain</x-table.heading>
                <x-table.heading>DNS</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('link_count')">Links</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('created')">Created</x-table.heading>
                <x-table.heading class="flex-end"></x-table.heading>
            </x-slot>
            <x-slot name="body">
                @foreach ($domains as $domain)
                    <x-table.row>
                        <x-table.cell><a href="{{ route('domain.links', $domain) }}" class="text-blue-600 font-semibold">{{ $domain->domain }}</a></x-table.cell>
                        <x-table.cell>
                            @if($domain->dns_configured === 1)
                                <svg class="inline-block w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            @else 
                                <svg class="inline-block w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif  
                        </x-table.cell>
                        <x-table.cell>{{ $domain->link_count }}</x-table.cell>
                        <x-table.cell>{{ $domain->created_at }}</x-table.cell>
                        <x-table.cell class="justify-end text-right">
                            <x-button-secondary type="button" href="{{ route('domain.links', $domain) }}" class="text-xs">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-gray-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                </svg>
                                Links
                            </x-button-secondary>
                            <x-button-secondary type="button" wire:click="showDomain({{ $domain->id }})" class="text-xs">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-gray-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>  
                                View
                            </x-button-secondary>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        <div>
            {{ $domains->links() }}
        </div>

        @livewire('domains.domain-panel')

    </div>
    <script>
        window.DomainsTable = () => {
            return {
            }
        }
    </script>
</div>