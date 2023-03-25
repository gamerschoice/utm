<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between border-b border-gray-300 py-6">

            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    Create a New Link
                </h1>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('link.advanced', $domain->id) }}">
                    <x-button class="text-lg">                 
                        Advanced
                    </x-button>
                </a>
            </div>

        </div>
    </x-slot>


    @livewire('links.create-link', [ 'domain' => $domain ])

</x-app-layout>
