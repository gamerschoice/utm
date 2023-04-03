<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between border-b border-gray-300 py-6">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    {{ __('Add a domain') }}
                </h1>
            </div>

        </div>
    </x-slot>

    @livewire('domains.create-domain-wizard')

</x-app-layout>
