<div>
    <x-section-border />

    <x-form-section submit="updateUrl">
        <x-slot name="title">
            {{ __('Website URL') }}
        </x-slot>

        <x-slot name="description">
            {{ __('The website that you wish to track links for.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="url" value="{{ __('Website URL including HTTP/HTTPS') }}" />

                <x-input id="url"
                            type="text"
                            class="mt-1 block w-full"
                            wire:model.defer="url"
                            :disabled="! Gate::check('update', $team)" />

                <x-input-error for="url" class="mt-2" />
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