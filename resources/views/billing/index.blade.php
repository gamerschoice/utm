<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">
            {{ __('Billing') }}
        </h1>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @foreach ($teams as $team)
                <h2>You need to pay for {{ $team->name }}</h2>

                <p>£15 - now.</p>

                <form id="payment_form" method="POST" action="/billing">
                    @csrf
                    <input id="card-holder-name" name="name" type="text">
 
                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element" class="w-full mt-1 md:mt-0 border border-gray-200 p-3 rounded StripeElement StripeElement--empty"></div>
                    
                    <button id="card-button" data-secret="{{ $intent->client_secret }}">
                        Update Payment Method
                    </button>

                    <input id="payment_method" type="hidden" name="payment_method" value="" />
                </form>
            @endforeach
        </div>
    </div>

    @pushOnce('scripts')
        <script src="https://js.stripe.com/v3/"></script>
    @endPushOnce

    @pushOnce('footer-scripts')
        <script>
            const stripe = Stripe('pk_test_51MnGlmHwvhcWXVfosjk5LiLigNP20cGTQG3BJwb63donAJgJEks8lGg2H5SbBhV057BGZrSQs9uC4cyUo5rKrPYK00NnE16gZQ');
        
            const elements = stripe.elements();
            const cardElement = elements.create('card');
        
            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const form = document.getElementById('payment_form');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;
            
            form.addEventListener('submit', async (e) => {
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
                    document.getElementById('payment_method').value = setupIntent.payment_method;
                    document.getElementById('payment_form').submit();
                }
            });
        </script>
    @endPushOnce
</x-app-layout>
