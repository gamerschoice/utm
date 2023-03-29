<div>
    <!-- Plan -->
    <section aria-labelledby="plan-heading">
        <form wire:submit.prevent="createSubscription">
            <div class="shadow sm:overflow-hidden sm:rounded-lg">
                @if($subscribed)
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
                    <div class="flex justify-between">
                        <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $subscribed ? 'Change Plan' : 'Choose Your Plan' }}</h3>

                        <div class="flex items-center gap-3">
                            <span class="ml-3 text-sm" id="annual-billing-label">
                            <span class="font-medium text-gray-900">Annual billing</span>
                            </span>
                            <button wire:click="$toggle('annualPricing')" type="button" class="{{ $annualPricing ? 'bg-blue-500' : 'bg-gray-200'}} relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2" role="switch" aria-checked="true" aria-labelledby="annual-billing-label">
                                <span aria-hidden="true" class="{{ $annualPricing ? 'translate-x-5' : 'translate-x-0'}} inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                            </button>
                        </div>
                    </div>

                    <fieldset>
                        <legend class="sr-only">Pricing plans</legend>
                        <div class="relative -space-y-px rounded-md bg-white" x-data="{ checked: null }">
                            @foreach($plans as $plan)
                                <label @class([
                                    "relative flex cursor-pointer flex-col border p-4 outline-none md:grid md:grid-cols-3 md:pr-6",
                                    "rounded-tl-md rounded-tr-md" => $loop->first,
                                    "rounded-bl-md rounded-br-md" => $loop->last
                                ]) @click="checked = '{{ $plan->sku }}'" x-bind:class="{ 'z-10 border-blue-200 bg-blue-50' : checked === '{{ $plan->sku }}', 'border-gray-200' : checked !== '{{ $plan->sku }}' }">
                                    <span class="flex items-center text-sm">
                                        <input type="radio" name="swapTo" wire:model.defer="swapTo" value="{{ $plan->sku }}" class="h-4 w-4 text-blue-500 border-gray-300">
                                        <span id="pricing-plans-0-label" class="ml-3 font-medium text-gray-900">{{ $plan->name }}</span>
                                    </span>
                                    <span class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                        <span class="font-medium" x-bind:class="{ 'text-blue-900' : checked === '{{ $plan->sku }}', 'text-gray-900' : checked !== '{{ $plan->sku }}' }">£{{ $annualPricing ? $plan->price_annual : $plan->price }} / mo</span>
                                    </span>
                                    <span class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right" x-bind:class="{ 'text-blue-700' : checked === '{{ $plan->sku }}', 'text-gray-500' : checked !== '{{ $plan->sku }}' }">
                                        {{ $plan->domains ?: 'Unlimited' }} domain
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </fieldset>

                    @unless ($subscribed)
                        <div>
                            <label for="cardHolderName" class="block text-sm font-medium leading-6 text-gray-900">Card Holder's Name</label>
                            <input id="card-holder-name" name="cardHolderName" wire:model="cardHolderName" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 mt-1 block w-full">
    
                            <!-- Stripe Elements Placeholder -->
                            <div wire:ignore id="card-element" class="w-full mt-1 md:mt-0 border border-gray-200 p-3 rounded"></div>
                        </div>
                    @endunless
                </div>

                @if($subscribed)
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <x-button wire:click.prevent="changePlan">Change Plan</x-button>
                    </div>
                @else
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <x-button id="card-button" type="submit" data-secret="{{ $intent->client_secret }}" wire:target="createSubscription" x-on:click="verify">Start Subscription</x-button>
                    </div>
                @endif

            </div>
        </form>
    </section>

    @pushOnce('footer-scripts')
        @unless ($subscribed)
        <script>  
            const stripe = Stripe('pk_test_51MnGlmHwvhcWXVfosjk5LiLigNP20cGTQG3BJwb63donAJgJEks8lGg2H5SbBhV057BGZrSQs9uC4cyUo5rKrPYK00NnE16gZQ');
        
            const elements = stripe.elements();
            const cardElement = elements.create('card');
        
            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;
            
            async function verify(e) {
                e.preventDefault();

                const { setupIntent, error } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );
            
                if (error) {
                    console.log(error.message)
                } else {
                    console.log(setupIntent.payment_method)
                    @this.set('payment_method', setupIntent.payment_method)
                    @this.call('createSubscription')
                }
            };
        </script>
        @endunless
    @endPushOnce
</div>
