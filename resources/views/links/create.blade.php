<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create Link') }}
                </h2>
            </div>

            <div>
                <a href="{{ route('links.index') }}">Show All Links</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @unless($teamConfigured)
                    {{ $teamConfigError }} - Please add a website in <a href="{{ route('teams.show', $currentTeam) }}">team settings</a>.
                @endunless

                @livewire('links.create-link-form')
        </div>
    </div>
</x-app-layout>
