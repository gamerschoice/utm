@props([
    'plans'
])
<div>
    <div id="pricing" class="isolate overflow-hidden" x-data="SectionPricing()">
        <div class="flow-root bg-blue-600 pt-24 pb-16 sm:pt-32 lg:pb-0">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="relative z-10">
                    
                    <div class="text-center mb-6">
                        <span class="text-sm pr-3 items-center border border-white/20 bg-white/10 rounded-full text-white p-1 inline-flex gap-3">
                            <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-0.5 font-medium text-green-800">New</span>
                            Free 7 day trial, no payment required
                        </span>
                    </div>
                    
                    <h3 class="mx-auto max-w-4xl text-center text-5xl font-bold tracking-tight text-white">Pricing plans for teams of&nbsp;all&nbsp;sizes</h3>
                    <p class="mx-auto mt-4 max-w-2xl text-center text-lg leading-8 text-white/70">Simple, flexible pricing. You don't need to worry about hitting your resource limits. Need another domain? Or another seat? Just add extras on to your account from within the app on the fly.</p>
                    
                    <div class="mt-16 flex justify-center">
                        <fieldset class="grid grid-cols-2 gap-x-1 rounded-full bg-white/5 p-1 text-center text-xs font-semibold leading-5 text-white border border-white/20">
                            <legend class="sr-only">Payment frequency</legend>
        
                            <label @click="billingTerm = 'monthly'" class="cursor-pointer rounded-full py-1 px-2.5" :class="{ 'bg-blue-600': billingTerm === 'monthly' }">
                                <input type="radio" name="frequency" value="monthly" class="sr-only">
                                <span>Monthly</span>
                            </label>
        
                            <label @click="billingTerm = 'annually'" class="cursor-pointer rounded-full py-1 px-2.5" :class="{ 'bg-blue-600': billingTerm === 'annually' }">
                                <input type="radio" name="frequency" value="annually" class="sr-only">
                                <span>Annually</span>
                            </label>
                        </fieldset>
                    </div>
                </div>
                <div class="relative mx-auto mt-10 grid max-w-md grid-cols-1 gap-y-8 lg:mx-0 lg:-mb-14 lg:max-w-none lg:grid-cols-3">
                    <svg viewBox="0 0 1208 1024" aria-hidden="true" class="absolute left-1/2 -bottom-48 h-[64rem] translate-y-1/2 -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] lg:bottom-auto lg:-top-48 lg:translate-y-0">
                        <ellipse cx="604" cy="512" fill="url(#d25c25d4-6d43-4bf9-b9ac-1842a30a4867)" rx="604" ry="512" />
                        <defs>
                        <radialGradient id="d25c25d4-6d43-4bf9-b9ac-1842a30a4867">
                            <stop stop-color="#ffffff" />
                            <stop offset="1" stop-color="#f2f2f2" />
                        </radialGradient>
                        </defs>
                    </svg>
                    <div class="hidden lg:absolute lg:inset-x-px lg:bottom-0 lg:top-4 lg:block lg:rounded-t-2xl lg:bg-gray-100 lg:ring-1 lg:ring-blue-100/10" aria-hidden="true"></div>
    
                    @foreach($plans as $plan)
                        <div x-data="{ price: { monthly: {{ $plan->price }}, annually: {{ $plan->price_annual }} } }"class="relative rounded-2xl @if($loop->first || $loop->last) ring-1 ring-white/10 lg:bg-transparent lg:pb-14 lg:ring-0 @else z-10 bg-white shadow-xl ring-1 ring-gray-900/10 @endif ">

                            <div class="p-8 lg:pt-12 xl:p-10 xl:pt-14">
                                <h3 class="text-sm font-semibold leading-6 text-blue-600">{{ $plan->name }}</h3>
                                <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between lg:flex-col lg:items-stretch">
                                    <div class="mt-2 flex items-center gap-x-4">
                                        <p class="text-4xl font-bold tracking-tight text-gray-900">£<span x-text="price[billingTerm]"></span></p>
                                        <div class="text-sm leading-5">
                                            <p class="text-gray-900">GBP</p>
                                            <p class="text-gray-500">Billed <span x-html="billingTerm">monthly</span></p>
                                        </div>
                                    </div>

                                    <a href="{{ route('register') }}" class="rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 text-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 bg-white/10 hover:bg-white/20 focus-visible:outline-white border-2 border-blue-600">Start free trial</a>

                                </div>
                                <div class="mt-8 flow-root sm:mt-10">
                                    <ul role="list" class="-my-2 divide-y border-t text-sm leading-6 lg:border-t-0 text-gray-600  @if($loop->first || $loop->last) divide-white/5 border-white/5 @else divide-gray-900/5 border-gray-900/5 @endif">
                                        <li class="flex gap-x-3 py-2">
                                            <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $plan->domains }} domain{{ $plan->domains > 1 ? 's' : '' }}
                                        </li>
        
                                        <li class="flex gap-x-3 py-2">
                                            <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $plan->seats }} user{{ $plan->seats > 1 ? 's' : '' }} / seat{{ $plan->seats > 1 ? 's' : '' }}
                                        </li>
        
                                        <li class="flex gap-x-3 py-2">
                                            <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $plan->links == -1 ? 'Unlimited' : $plan->links }} links
                                        </li>
    
                                        <li class="flex gap-x-3 py-2">
                                            <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $plan->domains }} custom shortlink domain{{ $plan->domains > 1 ? 's' : '' }}
                                        </li>

                                        @if(!$loop->first && !$loop->last)
                                            <li class="flex gap-x-3 pt-4 justify-center">
                                                <span class="inline-flex items-center rounded-md bg-blue-100 px-2.5 py-0.5 text-sm font-medium text-blue-800">
                                                    Our most popular tier
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <div class="relative bg-gray-50 lg:pt-24"></div>
    </div>

    <script>
        window.SectionPricing = () => {
            return {
                billingTerm: 'monthly', 
            }
        }
    </script>

</div>