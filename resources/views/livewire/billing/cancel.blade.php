<div>
    @if($subscription && $subscription->active())
        @if($subscription->onGracePeriod())

            <div class="bg-blue-700 shadow rounded-lg mt-5 sm:mt-10">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-base font-semibold leading-6 text-white">Subscription cancelled</h3>
                    @if($subscription && $subscription->onGracePeriod())
                        <div class="mt-2 max-w-xl text-sm text-white">
                            <p>Your subscription has been cancelled and your account will be terminated on <strong>{{ $subscription->ends_at->format('jS M Y') }}</strong></p>
                        </div>
                    @else 
                        <div class="mt-2 max-w-xl text-sm text-white">
                            <p>Your subscription has ended and your account has been terminated. IF you wish to set up a new subscription, please choose a plan on the left.</p>
                        </div>
                    @endif
                </div>
            </div>
        
        @else 
            <div class="bg-white shadow rounded-lg mt-5 sm:mt-10">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Cancel subscription</h3>
                    <div class="mt-2 max-w-xl text-xs text-gray-500">
                        <p>You can cancel your subscription upon reaching the end of your current billing cycle by clicking Cancel below. Please be aware, once your current billing cycle ends, you'll no longer be able to use your account, or have access to any of your data.</p>
                    </div>
                    <div class="mt-5">
                        <x-button-secondary wire:click="$toggle('confirmCancel')" type="button">
                            Cancel
                        </x-button-secondary>
                    </div>
                </div>
                <x-modal-neutral wire:model="confirmCancel">
                    <x-slot name="title">Are you sure?</x-slot>
                    <x-slot name="content">
                        <p class="mb-4">We just want to check... are you sure you want to cancel your team's subscription?</p>
                    </x-slot>
                    <x-slot name="footer">
                        <div class="flex justify-end gap-2 items-center">
                            <x-button-secondary wire:click="$toggle('confirmCancel')">Don't cancel</x-button-secondary>
                            <x-button type="button" wire:click="cancelSubscription">Yes, cancel my subscription</x-button>
                        </div>
                    </x-slot>
                </x-modal-neutral>
            </div>
        
        @endif
    @else
        {{-- if no subscription nothing to show --}}
    @endif
</div>