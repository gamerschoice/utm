@if($subscription->active())
<div class="bg-white shadow rounded-lg mt-5 sm:mt-10">
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Subscription extras</h3>
        <div class="my-4 max-w-xl text-sm text-gray-500">
            <p>Boost the limits on your subscription, without needing to elevate to the next tier.</p>
        </div>
        <div class="mt-4">
            <ul role="list" class="-my-4 divide-y divide-gray-200 w-full">

                @if(!$domain_extra_subscription || !$domain_extra_subscription->active())
                    <li class="py-4 cursor-default" x-data="{ confirming: false, quantity: 1, key: 'price_1MrPH6HwvhcWXVfoukyWcAgZ', cost_per: 5 }">
                        <div class="flex items-center justify-between">
                            <div class="min-w-0 flex items-center gap-2 select-none">
                                <select wire:model="domain_quantity" x-model="quantity" name="domain_quantity" class="max-w-full rounded-md border border-gray-300 py-1 text-left text-sm font-medium leading-5 text-gray-700 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>                
                                <span class="text-sm font-medium text-gray-900">Additional domain<span x-show="quantity > 1">s</span></span>
                                <span class="text-sm text-gray-600">£<span x-text="cost_per * quantity">5</span> /m</span>
                            </div>
                            <div>
                                <button @click="confirming = true" x-show="!confirming" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    Add
                                </button>
                                <div x-show="confirming" x-cloak class="flex items-center gap-2">
                                    <span class="text-xs font-medium">Are you sure?</span>
                                    <button wire:click="addExtraDomains" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                        <span>Confirm</span>
                                        <svg wire:loading wire:target="addExtraDomains" class="ml-1 animate-spin inline-block h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="py-4 cursor-default" x-data="{ confirming: false, quantity: {{ $domain_extra_subscription->quantity }}, key: 'price_1MrPH6HwvhcWXVfoukyWcAgZ', cost_per: 5 }">
                        <div class="flex items-center justify-between">
                            <div class="min-w-0 flex items-center gap-2 select-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-blue-600">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                  
                                <select disabled="disabled" wire:model="domain_quantity" x-model="quantity" id="quantity" name="quantity" class="max-w-full rounded-md border border-gray-300 py-1 text-left text-sm font-medium leading-5 text-gray-700 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                                    <option>{{ $domain_extra_subscription->quantity }}</option>
                                </select>                
                                <span class="text-sm font-medium text-gray-900">Additional domain<span x-show="quantity > 1">s</span></span>
                                <span class="text-sm text-gray-600">£<span x-text="cost_per * quantity">5</span> /m</span>
                            </div>
                            <div>
                                <button wire:click="cancelExtraDomains" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    <span>Remove</span>
                                    <svg wire:loading wire:target="cancelExtraDomains" class="ml-1 animate-spin inline-block h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </li>
                @endif

                @if(!$seat_extra_subscription || !$seat_extra_subscription->active())
                    <li class="py-4 cursor-default" x-data="{ confirming: false, quantity: 1, cost_per: 2 }">
                        <div class="flex items-center justify-between">
                            <div class="min-w-0 flex items-center gap-2 select-none">
                                <select wire:mode="seat_quantity" x-model="quantity" name="seat_quantity" class="max-w-full rounded-md border border-gray-300 py-1 text-left text-sm font-medium leading-5 text-gray-700 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>                
                                <span class="text-sm font-medium text-gray-900">Additional seat<span x-show="quantity > 1">s</span></span>
                                <span class="text-sm text-gray-600">£<span x-text="cost_per * quantity">2</span> /m</span>
                            </div>
                            <div>
                                <button @click="confirming = true" x-show="!confirming" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    Add
                                </button>
                                <div x-show="confirming" x-cloak class="flex items-center gap-2">
                                    <span class="text-xs font-medium">Are you sure?</span>
                                    <button wire:click="addExtraSeats" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                        <span>Confirm</span>
                                        <svg wire:loading wire:target="addExtraSeats" class="ml-1 animate-spin inline-block h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @else 
                <li class="py-4 cursor-default" x-data="{ confirming: false, quantity: {{ $seat_extra_subscription->quantity }}, cost_per: 2 }">
                    <div class="flex items-center justify-between">
                        <div class="min-w-0 flex items-center gap-2 select-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-blue-600">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                            </svg>
                              
                            <select disabled="disabled" name="seat_quantity" class="max-w-full rounded-md border border-gray-300 py-1 text-left text-sm font-medium leading-5 text-gray-700 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                                <option>{{ $seat_extra_subscription->quantity }}</option>
                            </select>                
                            <span class="text-sm font-medium text-gray-900">Additional seat<span x-show="quantity > 1">s</span></span>
                            <span class="text-sm text-gray-600">£<span x-text="cost_per * quantity">2</span> /m</span>
                        </div>
                        <div>
                            <button wire:click="cancelExtraSeats" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                <span>Remove</span>
                                <svg wire:loading wire:target="cancelExtraSeats" class="ml-1 animate-spin inline-block h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </li>
                @endif
            </ul>
        </div>
        <p class="mt-8 text-gray-600 text-xs">Please note: these additional subscription are charged <strong>monthly</strong> irrespective of your main plan's billing cycle.</p>
    </div>

</div>
@endif