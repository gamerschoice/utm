<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between border-b border-gray-300 py-6">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    {{ __('Domains') }}
                </h1>
            </div>

            <div class="flex gap-3">

                <x-button href="#" class="text-lg">                 
                    <a href="{{ route('domain.create') }}">Add A Domain</a>
                </x-button>

            </div>
        </div>
    </x-slot>

    @livewire('domains.index')

</x-app-layout>
