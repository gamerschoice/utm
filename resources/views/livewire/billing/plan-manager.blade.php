<div>
    <!-- Plan -->
    <section aria-labelledby="plan-heading">
        <form wire:submit.prevent="changePlan">
            <div class="shadow sm:overflow-hidden sm:rounded-lg">
                @if($subscription)
                    <div class="space-y-6 bg-white py-6 px-4 sm:p-6">
                        <div>
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Current Plan</h3>
                        </div>

                        <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 sm:mt-0 sm:ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $current->name }}</div>
                                    <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                        <div>Since {{ $subscription->created_at->format('F Y') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="space-y-6 bg-white py-6 px-4 sm:p-6">
                    <div>
                        <h3 class="text-base font-semibold leading-6 text-gray-900">Change Plan</h3>
                    </div>

                    <fieldset>
                        <legend class="sr-only">Pricing plans</legend>
                        <div class="relative -space-y-px rounded-md bg-white">
                            @foreach($plans as $plan)
                                <!-- Checked: "z-10 border-blue-200 bg-blue-50", Not Checked: "border-gray-200" -->
                                <label @class([
                                    "relative flex cursor-pointer flex-col border p-4 focus:outline-none md:grid md:grid-cols-3 md:pr-6",
                                    "rounded-tl-md rounded-tr-md" => $loop->first,
                                    "rounded-bl-md rounded-br-md" => $loop->last
                                ])
                                wire:key="{{ $plan->id }}">
                                    <span class="flex items-center text-sm">
                                        <input type="radio" wire:model.defer="swapTo" value="{{ $plan->sku }}" class="h-4 w-4 text-blue-500 border-gray-300 focus:ring-gray-900" aria-labelledby="pricing-plans-0-label" aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                        <span id="pricing-plans-0-label" class="ml-3 font-medium text-gray-900">{{ $plan->name }}</span>
                                    </span>
                                    <span id="pricing-plans-0-description-0" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                        <!-- Checked: "text-blue-900", Not Checked: "text-gray-900" -->
                                        <span class="font-medium">£{{ $plan->price }} / mo</span>
                                    </span>
                                    <!-- Checked: "text-blue-700", Not Checked: "text-gray-500" -->
                                    <span id="pricing-plans-0-description-1" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right">{{ $plan->domains ?: 'Unlimited' }} domain</span>
                                </label>
                            @endforeach
                        </div>
                    </fieldset>

                    <div class="flex items-center">
                        <!-- Enabled: "bg-blue-500", Not Enabled: "bg-gray-200" -->
                        <button type="button" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2" role="switch" aria-checked="true" aria-labelledby="annual-billing-label">
                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                        <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                        <span class="ml-3 text-sm" id="annual-billing-label">
                        <span class="font-medium text-gray-900">Annual billing</span>
                        <span class="text-gray-500">(Save 10%)</span>
                        </span>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <x-button type="submit">Change Plan</x-button>
                </div>
            </div>
        </form>
    </section>
</div>
