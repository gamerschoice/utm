<div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-10 mt-6">

    <div class="md:col-span-2">

        <div class="flex h-full flex-col rounded-lg bg-white py-6 shadow-md">

            <div class="relative flex-1 px-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Domain details</h3>
                <div class="border-gray-200 pt-5">

                    <dl class="sm:divide-y sm:divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500">Created</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $domain->created_at }}
                            </dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500">Domain</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                <a class="underline decoration-dotted" href="{{ $domain->domain }}" target="_blank" rel="noopener nofollow">
                                    {{ $domain->domain }}
                                </a>
                            </dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500">Links</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                {{ $domain->link_count }}
                            </dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500">Shortlink domain</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                {!! $domain->shortlink_domain === 'NULL' ? '<em>not set</em>' : $domain->shortlink_domain !!}
                            </dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                            <dt class="text-sm font-medium text-gray-500">Shortlinks enabled?</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                @if($domain->dns_configured === 1)
                                    <svg class="inline-block w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                @else 
                                    <svg class="inline-block w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif  
                            </dd>
                        </div>
                    </dl>

                </div>

            </div>

        </div>

    </div>

    <div class="md:col-span-1 flex flex-col gap-6">

        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Rename domain</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>You can update/rename your domain, and all associated long link URLs by clicking below.</p>
                </div>
                <div class="mt-5">
                    <button wire:click="$toggle('renamingDomain')" type="button" class="inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500">Rename domain</button>
                </div>
            </div>
            <x-modal-neutral wire:model="renamingDomain" x-data="{ newDomainName: '' }">
                <x-slot name="title">Rename domain?</x-slot>
                <x-slot name="content">
                    <p class="mb-4">If you delete your domain, all UTM Wise links will be removed, and your shortdomain links will stop working. If you're sure you want to do this, please type <strong>{{ $domain->domain }}</strong> in the text box below and click Delete.</p>
                    <x-input class="text-base" type="text" wire:model.defer="newDomainName" placeholder="example.com" />
                    @if($errorMessage) <p class="text-red-500 mt-4">{{ $errorMessage }}</p> @endif
                </x-slot>
                <x-slot name="footer">
                    <div class="flex justify-end gap-2 items-center">
                        <x-button-secondary wire:click="$toggle('renamingDomain')">Cancel</x-button-secondary>
                        <x-button type="button" wire:click="renameDomain">Rename</x-button>
                    </div>
                </x-slot>
            </x-modal-neutral>
        </div>

        <div class="bg-white shadow rounded-lg" x-data="{ deleteModalOpen: false, confirmDomainName: '' }">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Delete domain</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>You can completely remove your domain, and all links you've created for it, by clicking below.</p>
                </div>
                <div class="mt-5">
                    <button wire:click="$toggle('confirmingDomainDelete')" type="button" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete domain</button>
                </div>
            </div>

            <x-modal-danger wire:model="confirmingDomainDelete" x-data="{ confirmDomainName: '' }">
                <x-slot name="title">Are you sure?</x-slot>
                <x-slot name="content">
                    <p class="mb-4">If you delete your domain, all UTM Wise links will be removed, and your shortdomain links will stop working. If you're sure you want to do this, please type <strong>{{ $domain->domain }}</strong> in the text box below and click Delete.</p>
                    <x-input class="text-base" type="text" x-model="confirmDomainName" placeholder="Please type: {{ $domain->domain }}" />
                </x-slot>
                <x-slot name="footer">
                    <div class="flex justify-end gap-2 items-center">
                        <x-button-secondary wire:click="$toggle('confirmingDomainDelete')">Cancel</x-button-secondary>
                        <x-button-danger wire:click="deleteDomain" x-bind:disabled="confirmDomainName !== '{{ $domain->domain }})'" x-bind:class="{ 'opacity-50' : confirmDomainName !== '{{ $domain->domain }}', 'opacity-100' : confirmDomainName == '{{ $domain->domain }}' }">Delete</x-button-danger>
                    </div>
                </x-slot>
            </x-modal-danger>

        </div>

    </div>
</div>