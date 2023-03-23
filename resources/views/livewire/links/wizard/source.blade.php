<div class="flex flex-col pt-5 lg:pt-8 gap-y-5 lg:gap-y-8">

    <x-steps :steps="$steps" />

    <div class="text-center w-full lg:w-2/3 xl:w-1/2 mx-auto">
        <h2 class="text-xl font-bold mb-2">Set your traffic source</h2>
        <p class="text-base font-medium">Set up the source of traffic for your link.</p>
    </div>

    <fieldset x-data="LinkSource()" class="flex flex-col gap-y-5 lg:gap-y-8">

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">

            @if($purpose !== 'custom')

                @foreach($presets[ $purpose ] as $source)

                    <label 
                        :class="{ 'border-blue-600 ring-2 ring-blue-600' : (source === '{{ $source['value'] }}') , 'border-gray-300' : !(source === '{{ $source['value'] }}') }"
                        class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                        <input x-model="source" wire:model.defer="source" type="radio" name="source" value="{{ $source['value'] }}" class="sr-only">
                        <span class="flex flex-1">
                            <span class="flex flex-col">
                                <span class="block text-lg font-medium text-gray-900">{{ $source['label'] }}</span>
                            </span>
                        </span>
                        <svg :class="{ 'invisible' : !(source === '{{ $source['value'] }}') }" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                        </svg>

                        <span :class="{ 'border-2 border-blue-600' : (source === '{{ $source['value'] }}'), 'border border-transparent' : !(source === '{{ $source['value'] }}') }" class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
                    </label>

                @endforeach

            @endif

            <label 
                :class="{ 'border-blue-600 ring-2 ring-blue-600' : (source === 'custom') , 'border-gray-300' : !(source === 'custom') }"
                class="@if(count($presets[$purpose]) == 0) sm:col-start-2 @endif relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                <input x-model="source" wire:model.defer="source" type="radio" name="source" value="custom" class="sr-only">
                <span class="flex flex-1">
                    <span class="flex flex-col">
                        <span class="block text-lg font-medium text-gray-900">Custom</span>
                    </span>
                </span>
                <svg :class="{ 'invisible' : !(source === 'custom') }" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>

                <span :class="{ 'border-2 border-blue-600' : (source === 'custom'), 'border border-transparent' : !(source === 'custom') }" class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
            </label>
            
        </div>


        <div class="flex justify-center">
            <x-button type="button" wire:click="nextStep" class="items-center">
                <span class="text-lg px-4">Next</span>
                <svg wire:loading class="animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </x-button>
        </div>

    </fieldset>
      
    <script>
        window.LinkSource = () => {
            return {
                source: 'custom',
            }
        }
    </script>
</div>
