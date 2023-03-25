<div>
    <div class="flex flex-col space-y-5 mt-8" x-data="DomainsTable()">
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('domain')">Domain</x-table.heading>
                <x-table.heading>DNS</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('link_count')">Shortlink domain</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('link_count')">Links</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('created')">Created</x-table.heading>
                <x-table.heading class="flex-end"></x-table.heading>
            </x-slot>
            <x-slot name="body">
                @foreach ($domains as $domain)
                    <x-table.row>
                        <x-table.cell><a href="{{ route('domain.view', $domain) }}" class="text-blue-600 font-semibold">{{ $domain->domain }}</a></x-table.cell>
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
                        <x-table.cell>{{ $domain->shortlink_domain == 'NULL' ? '' : $domain->shortlink_domain }}</x-table.cell>
                        <x-table.cell>{{ $domain->link_count }}</x-table.cell>
                        <x-table.cell>{{ $domain->created_ago }}</x-table.cell>
                        <x-table.cell class="justify-end text-right">
                            <a href="{{ route('domain.view', $domain) }}">
                                <x-button-secondary type="button" class="text-xs">
                                    View
                                </x-button-secondary>
                            </a>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        <div>
            {{ $domains->links() }}
        </div>

    </div>
    <script>
        window.DomainsTable = () => {
            return {
            }
        }
    </script>
</div>