<div>
    <x-form-section submit="createLink">
        <x-slot name="title">
            {{ __('Destination URL') }}
        </x-slot>

        <x-slot name="description">
            {{ __('The destination that you wish to track.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="destination" value="{{ __('Destination URL') }}" />

                <x-input id="destination"
                            type="text"
                            class="mt-1 block w-full"
                            wire:model.defer="destination"
                            :disabled="! Gate::check('update', $team)" />

                <x-input-error for="destination" class="mt-2" />
            </div>
        </x-slot>

        @if (Gate::check('update', $team))
            <x-slot name="actions">
                <x-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button>
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        @endif
    </x-form-section>
</div>