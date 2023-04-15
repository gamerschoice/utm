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
                @if($domains->isEmpty())
                <x-table.row>
                    <x-table.cell colspan="6">
                        <div class="relative block w-full h-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                            </svg>  
                            <span class="mt-2 block text-base font-semibold text-gray-900">No domains found</span>
                            <span class="text-sm mt-2 font-medium text-gray-500 mx-auto sm:w-2/3 block">
                                <a href="{{ route('domain.create') }}">
                                    <x-button type="button">
                                        Create one
                                    </x-button>
                                </a>
                            </span>
                        </div>
                    </x-table.cell>
                </x-table.row>
                @endif
                @foreach ($domains as $domain)
                    <x-table.row>
                        <x-table.cell><a href="{{ route('domain.view', $domain) }}" class="text-blue-600 font-semibold">{{ $domain->domain }}</a></x-table.cell>
                        <x-table.cell>

                            @if($domain->shortdomain)

                                @if($domain->shortdomain->status === 'active')
                                    <svg class="inline-block w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                @else 
                                    <svg class="w-5 h-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor" >
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                                    </svg>      
                                @endif

                            @else 
                                <svg class="inline-block w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif

                        </x-table.cell>
                        <x-table.cell>
                            @if($domain->shortdomain)
                                {{ $domain->shortdomain->host  }}
                            @else 
                                <div class="shrink-0 inline-flex gap-x-1 items-center cursor-default rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">
                                    <span>no shortlink domain</span>
                                </div>
                            @endif
                        </x-table.cell>
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