@if($subscription->active())
<div class="bg-white shadow rounded-lg mt-5 sm:mt-10">
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Subscription extras</h3>
        <div class="my-4 max-w-xl text-sm text-gray-500">
            <p>Boost the limits on your subscription, without needing to elevate to the next tier.</p>
        </div>
        <div class="mt-4">
            <ul role="list" class="-my-4 divide-y divide-gray-200 w-full">

                <li class="py-4 cursor-default" x-data="{ confirming: false, quantity: 1, product: '', cost_per: 5 }">
                    <div class="flex items-center justify-between">
                        <div class="min-w-0 flex items-center gap-2 select-none">
                            <select x-model="quantity" id="quantity" name="quantity" class="max-w-full rounded-md border border-gray-300 py-1 text-left text-sm font-medium leading-5 text-gray-700 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>                
                            <span class="text-sm font-medium text-gray-900">Additional domain<span x-show="quantity > 1">s</span></span>
                            <span class="text-sm text-gray-600">£<span x-text="cost_per * quantity">5</span></span>
                        </div>
                        <div>
                            <button @click="confirming = true" x-show="!confirming" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                Add
                            </button>
                            <div x-show="confirming" x-cloak class="flex items-center gap-2">
                                <span class="text-xs font-medium">Are you sure?</span>
                                <button type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="py-4 cursor-default" x-data="{ confirming: false, quantity: 1, product: '', cost_per: 2 }">
                    <div class="flex items-center justify-between">
                        <div class="min-w-0 flex items-center gap-2 select-none">
                            <select x-model="quantity" id="quantity" name="quantity" class="max-w-full rounded-md border border-gray-300 py-1 text-left text-sm font-medium leading-5 text-gray-700 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>                
                            <span class="text-sm font-medium text-gray-900">Additional user<span x-show="quantity > 1">s</span>/seat<span x-show="quantity > 1">s</span></span>
                            <span class="text-sm text-gray-600">£<span x-text="cost_per * quantity">2</span></span>
                        </div>
                        <div>
                            <button @click="confirming = true" x-show="!confirming" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                Add
                            </button>
                            <div x-show="confirming" x-cloak class="flex items-center gap-2">
                                <span class="text-xs font-medium">Are you sure?</span>
                                <button type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>

</div>
@endif