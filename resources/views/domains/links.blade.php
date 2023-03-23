<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between border-b border-gray-300 py-6">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    Links: {{ $domain->domain }}
                </h1>
            </div>

            <div class="flex gap-3">

                @livewire('links.export')

                
                <a href="{{ route('link.create', $domain->id) }}">
                    <x-button class="text-lg">                 
                        Create a New Link
                    </x-button>
                </a>
            </div>
        </div>
    </x-slot>


    @livewire('domains.links')

</x-app-layout>
