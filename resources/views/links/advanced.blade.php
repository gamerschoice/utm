<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between border-b border-gray-300 py-6">

            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    Create Links <small class="text-base">(advanced)</small>
                </h1>
                <p class="mt-4 text-gray-600">Use this form to bulk import and attribute a whole bunch of links in one swoop.</p>
            </div>
            <div class="flex gap-3">
                
                <a href="{{ route('link.create', $domain->id) }}">
                    <x-button class="text-lg">                 
                        Wizard
                    </x-button>
                </a>
            </div>

        </div>
    </x-slot>


    @livewire('links.create-advanced', [ 'domain' => $domain ])

</x-app-layout>
