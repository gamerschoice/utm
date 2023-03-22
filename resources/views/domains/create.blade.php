<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    {{ __('Create Domain') }}
                </h1>
            </div>

            <div>
                
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('domains.create-domain')
            </div>
        </div>
    </div>
</x-app-layout>
