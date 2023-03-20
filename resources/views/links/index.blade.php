<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    {{ __('Links') }}
                </h1>
            </div>

            <div>
                <a href="{{ route('links.create') }}">Create Link</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
