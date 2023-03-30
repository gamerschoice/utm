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

                    @livewire('billing.payment-method')

                </div>
            </div>

            {{-- @foreach ($teams as $team)
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
            @endforeach --}}
        </div>
    </div>


      

    @pushOnce('scripts')
        <script src="https://js.stripe.com/v3/"></script>
    @endPushOnce
</x-app-layout>
