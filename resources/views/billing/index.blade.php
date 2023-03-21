<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">
            {{ __('Billing') }}
        </h1>
    </x-slot>



    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="grid grid-cols-2 gap-10">

                <div>
                    @livewire('billing.plan-manager')

                    @livewire('billing.invoices')

                </div>
                <div>

                    <!-- Payment info -->
                    <section class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Payment method</h3>
                            <div class="mt-5">
                                <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                <div class="sm:flex sm:items-start">
                                    <svg class="h-8 w-auto sm:h-6 sm:flex-shrink-0" viewBox="0 0 36 24" aria-hidden="true">
                                    <rect width="36" height="24" fill="#224DBA" rx="4" />
                                    <path fill="#fff" d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z" />
                                    </svg>
                                    <div class="mt-3 sm:mt-0 sm:ml-4">
                                    <div class="text-sm font-medium text-gray-900">Ending with 4242</div>
                                    <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                        <div>Expires 12/20</div>
                                        <span class="hidden sm:mx-2 sm:inline" aria-hidden="true">&middot;</span>
                                        <div class="mt-1 sm:mt-0">Last updated on 22 Aug 2017</div>
                                    </div>
                                    </div>
                                </div>
                                <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                                    <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    

                </div>
            </div>

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
