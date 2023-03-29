<div x-data="{ open: false, editing: false, deleting: false }" x-show="open" @close-link-panel.window="open = false; editing = false;" @open-link-panel.window="open = true" x-cloak class="relative z-[100]" role="dialog" aria-modal="true">
    
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

                    <form class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl" wire:submit.prevent="updateLink">

                        <div class="px-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">Link details</h2>
                                <div class="ml-3 flex gap-2 h-7 items-center">
                                    <x-button-danger x-show="!editing && !deleting" @click="deleting = true">
                                        Delete
                                    </x-button-danger>

                                    <div x-show="deleting" class="flex gap-2 items-center">
                                        <span class="text-sm font-semibold">Are you sure?</span>
                                        <x-button-secondary @click="deleting = false">
                                            Cancel
                                        </x-button-secondary>
                                        <x-button-danger wire:loading.attr="disabled" wire:click="deleteLink" @click="deleting = false">
                                            Delete
                                            <svg x-cloak wire:loading wire:target="deleteLink" class="animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </x-button-danger>
                                    </div>
                                    <div class="flex gap-2 items-center" x-show="editing && !deleting">
                                        <x-button-secondary type="reset" @click="open = false; editing = false">
                                            Discard
                                        </x-button-secondary>
                                        <x-button wire:loading.attr="disabled" type="submit" @click="editing = true" class="inline-flex gap-1 items-center">
                                            Save
                                            <svg x-cloak wire:loading wire:target="updateLink" class="animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </x-button>
                                    </div>
                                    <div class="flex gap-2 items-center" x-show="!editing && !deleting">
                                        <x-button-secondary wire:loading.attr="disabled" x-show="!editing && !deleting" wire:click="duplicateLink" type="button">
                                            <span>Duplicate</span>
                                            <svg x-cloak wire:loading wire:target="duplicateLink" class="ml-1 animate-spin inline-block h-4 w-4 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        </x-button-secondary>
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
                                @if($link)
                                    <dl class="sm:divide-y sm:divide-gray-200">
                                        <div x-show="!editing" class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Created</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                {{ $link->created_at }}
                                            </dd>
                                        </div>
                                        <div x-show="!editing" class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Last updated</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                {{ $link->updated_at }}
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Desination</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <a x-show="!editing" class="underline decoration-dotted" href="{{ $link->destination }}" target="_blank" rel="noopener nofollow">
                                                    {{ $link->destination }}
                                                </a>
                                                <x-input required x-show="editing" wire:model.defer="link.destination" type="text" value="{{ $link->destination }}" />
                                                @error('link.destination') <span class="text-red-500">{{ $message }}</span> @enderror
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Source</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{{ $link->utm_source }}</span>
                                                <x-input x-show="editing" wire:model.defer="link.utm_source" type="text" value="{{ $link->utm_source }}" />
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Medium</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{{ $link->utm_medium }}</span>
                                                <x-input x-show="editing" wire:model.defer="link.utm_medium" type="text" value="{{ $link->utm_medium }}" />
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Campaign</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{{ $link->utm_campaign  }}</span>
                                                <x-input x-show="editing" wire:model.defer="link.utm_campaign" type="text" value="{{ $link->utm_campaign }}" />
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Term</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{{ $link->utm_term }}</span>
                                                <x-input x-show="editing" wire:model.defer="link.utm_term" type="text" value="{{ $link->utm_term }}" />
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Content</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{{ $link->utm_content }}</span>
                                                <x-input x-show="editing" wire:model.defer="link.utm_content" type="text" value="{{ $link->utm_content }}" />
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Source Platform</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{{ $link->utm_source_platform }}</span>
                                                <x-input x-show="editing" wire:model.defer="link.utm_source_platform" type="text" value="{{ $link->utm_source_platform }}" />
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Creative Format</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{{ $link->utm_creative_format }}</span>
                                                <x-input x-show="editing" wire:model.defer="link.utm_creative_format" type="text" value="{{ $link->utm_creative_format }}" />
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">UTM Marketing Tactic</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{{ $link->utm_marketing_tactic }}</span>
                                                <x-input x-show="editing" wire:model.defer="link.utm_marketing_tactic" type="text" value="{{ $link->utm_marketing_tactic }}" />
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">Notes</dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span x-show="!editing">{!! $link->notes !!}</span>
                                                <x-textarea x-show="editing" wire:model.defer="link.notes">{{ $link->notes }}</x-textarea>
                                            </dd>
                                        </div>
                                        <div x-show="!editing" class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                URL
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 flex flex-col items-start gap-3">
                                                <span class="w-full truncate">{!! $link->auto_url !!}</span>
                                                <x-button type="button" x-data="{ copied: false }" class="text-xs" @click.prevent="window.navigator.clipboard.writeText('{{ $link->auto_url }}'); copied = true; setTimeout( function() { copied = false }, 3000);">
                                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-white-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                                    </svg>
                                                    <span x-show="!copied">Copy</span>
                                                    <span x-cloak x-show="copied">Copied!</span>
                                                </x-button>
                                            </dd>
                                        </div>
                                        <div x-show="!editing" class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6">
                                            <dt class="text-sm font-medium text-gray-500">
                                                URL (long)
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 flex flex-col items-start gap-3">
                                                <span class="truncate w-full">{!! $link->full_url !!}</span>
                                                <x-button-secondary type="button" x-data="{ copied: false }" class="text-xs" @click.prevent="window.navigator.clipboard.writeText('{{ $link->full_url }}'); copied = true; setTimeout( function() { copied = false }, 3000);">
                                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer mr-1 text-white-800">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                                    </svg>
                                                    <span x-show="!copied">Copy</span>
                                                    <span x-cloak x-show="copied">Copied!</span>
                                                </x-button-secondary>
                                            </dd>
                                        </div>
                                        <div x-show="!editing" class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:px-6" x-data="{ qrImage: QRCode.toDataURL('{{ $link->auto_url }}', { width:2560, quality:1 }) }">
                                            <dt class="text-sm font-medium text-gray-500">
                                                QR
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 flex flex-col items-start">
                                                <div>
                                                    <img x-bind:src="qrImage" class="w-full">
                                                </div>
                                                <a x-bind:href="qrImage" target="_blank" rel="noopener nofollow" download="qr.jpg">
                                                    <x-button type="button">
                                                        Download
                                                    </x-button>
                                                </a>
                                            </dd>
                                        </div>
                                    </dl>
                                @endif
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>