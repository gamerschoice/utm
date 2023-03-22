<div x-data="{ open: false, editing: false, deleting: false }" x-show="open" @close-domain-panel.window="open = false; editing = false;" @open-domain-panel.window="open = true" x-cloak class="relative z-[100]" role="dialog" aria-modal="true">
    
    <div x-show="open" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        x-transition:enter="ease-in-out duration-500" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="ease-in-out duration-500" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" >
    </div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div @click.away="open = false" x-show="open" class="pointer-events-auto w-screen max-w-xl transition"
                    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
                    x-transition:enter-start="translate-x-full" 
                    x-transition:enter-end="translate-x-0" 
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" 
                    x-transition:leave-start="translate-x-0" 
                    x-transition:leave-end="translate-x-full">

                    <form class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl" wire:submit.prevent="updateDomain">

                            <div class="px-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">Domain details</h2>
                                    <div class="ml-3 flex gap-2 h-7 items-center">
                                        <x-button-danger x-show="!editing && !deleting" @click="deleting = true">
                                            Delete
                                        </x-button-danger>

                                        <div x-show="deleting" class="flex gap-2 items-center">
                                            <span class="text-sm font-semibold">Are you sure?</span>
                                            <x-button-secondary @click="deleting = false">
                                                Cancel
                                            </x-button-secondary>
                                            <x-button-danger wire:click="deleteDomain()" @click="deleting = false">
                                                Delete
                                            </x-button-danger>
                                        </div>
                                        <div class="flex gap-2 items-center" x-show="editing && !deleting">
                                            <x-button-secondary type="reset" @click="open = false; editing = false">
                                                Discard
                                            </x-button-secondary>
                                            <x-button type="submit" @click="editing = true">
                                                Save
                                            </x-button>
                                        </div>
                                        <div class="flex gap-2 items-center" x-show="!editing && !deleting">
                                            <x-button-secondary x-show="!editing && !deleting" type="button" @click="editing = true">
                                                Edit
                                            </x-button-secondary>
                                            <x-button-secondary x-show="!deleting" type="button" @click="open = false; editing = false;">
                                                Close
                                            </x-button-secondary>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                    @if($domain)
                                        <dl class="sm:divide-y sm:divide-gray-200">
                                            <div x-show="!editing" class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">Created</dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                    {{ $domain->created_at }}
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">Domain</dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                    <a x-show="!editing" class="underline decoration-dotted" href="{{ $domain->domain }}" target="_blank" rel="noopener nofollow">
                                                        {{ $domain->domain }}
                                                    </a>
                                                    <x-input required x-show="editing" wire:model.defer="domain.domain" type="text" value="{{ $domain->domain }}" />
                                                    @error('domain.domain') <span class="text-red-500">{{ $message }}</span> @enderror
                                                </dd>
                                            </div>
                                            <div x-show="!editing" class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">Links</dt>
                                                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                    {{ $domain->link_count }}
                                                </dd>
                                            </div>
                                            <div x-show="!editing" class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                                <dt class="text-sm font-medium text-gray-500">DNS</dt>
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
                                    @endif
                                </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>