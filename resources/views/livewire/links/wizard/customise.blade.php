<div>
    <div class="flex flex-col pt-5 lg:pt-8 gap-y-5 lg:gap-y-8">

        @if(!$link)

            <x-steps :steps="$steps" />

            <div class="text-center w-full lg:w-2/3 xl:w-1/2 mx-auto">
                <h2 class="text-xl font-bold mb-2">Finalise your link</h2>
                <p class="text-base font-medium">Customise the final parameters of your link.</p>
            </div>

            <form wire:submit.prevent="saveLink" class="flex flex-col gap-8 w-full p-6 lg:p-8 shadow-lg rounded-lg bg-white">
                <div class="w-full lg:w-10/12 mx-auto flex flex-col gap-y-5">

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <label for="utm_source" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Source</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input x-on:keyup.prevent="$el.value = $el.value.replace(/\s+/g, '-').toLowerCase()" wire:model.defer="utm_source" type="text" name="utm_source" id="utm_source" autocomplete="utm_source" />
                            <div class="mt-1 text-sm text-gray-500">The source of the traffic to your link, e.g. <em>instagram</em>, <em>newsletter</em></div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <label for="utm_medium" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Medium</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input x-on:keyup.prevent="$el.value = $el.value.replace(/\s+/g, '-').toLowerCase()" wire:model.defer="utm_medium" type="text" name="utm_medium" id="utm_medium" autocomplete="utm_medium" />
                            <div class="mt-1 text-sm text-gray-500">The marketing medium, e.g. <em>social</em>, or <em>email</em></div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <label for="utm_campaign" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Campaign</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input x-on:keyup.prevent="$el.value = $el.value.replace(/\s+/g, '-').toLowerCase()" wire:model.defer="utm_campaign" type="text" name="utm_campaign" id="utm_campaign" autocomplete="utm_campaign" />
                            <div class="mt-1 text-sm text-gray-500">The campaign or individual promotion name, e.g. <em>summer-collection-2023</em></div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <div>
                            <label for="utm_term" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Term</label>
                            <span class="text-gray-500 text-sm">Optional</span>
                        </div>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input wire:model.defer="utm_term" type="text" name="utm_term" id="utm_term" autocomplete="utm_term" />
                            <div class="mt-1 text-sm text-gray-500">Paid search or CPC keywords, e.g. <em>best winter raincoats</em></div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <div>
                            <label for="utm_content" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Content</label>
                            <span class="text-gray-500 text-sm">Optional</span>
                        </div>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input wire:model.defer="utm_content" type="text" name="utm_content" id="utm_content" autocomplete="utm_content" />
                            <div class="mt-1 text-sm text-gray-500">Used to differentiate between similar links. You may want to use this to track which specific CTA was clicked, e.g. <em>buy-now</em> or <em>add-to-cart</em></div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <div>
                            <label for="utm_source_platform" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Source Platform</label>
                            <span class="text-gray-500 text-sm">Optional</span>
                        </div>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input x-on:keyup.prevent="$el.value = $el.value.replace(/\s+/g, '-').toLowerCase()" wire:model.defer="utm_source_platform" type="text" name="utm_source_platform" id="utm_source_platform" autocomplete="utm_source_platform" />
                            <div class="mt-1 text-sm text-gray-500">Used to identify which marketing platform sent the traffic e.g. <em>Google Ads</em>, <em>Search Ads 360</em></div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <div>
                            <label for="utm_creative_format" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Creative Format</label>
                            <span class="text-gray-500 text-sm">Optional</span>
                        </div>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input x-on:keyup.prevent="$el.value = $el.value.replace(/\s+/g, '-').toLowerCase()" wire:model.defer="utm_creative_format" type="text" name="utm_creative_format" id="utm_creative_format" autocomplete="utm_creative_format" />
                            <div class="mt-1 text-sm text-gray-500">Used to identify the format of the content users have clicked on to get your site e.g. <em>video</em>, <em>skyscraper</em>, <em>text</em>, <em>tweet</em> etc.</div>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <div>
                            <label for="utm_marketing_tactic" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Marketing Tactic</label>
                            <span class="text-gray-500 text-sm">Optional</span>
                        </div>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-input x-on:keyup.prevent="$el.value = $el.value.replace(/\s+/g, '-').toLowerCase()" wire:model.defer="utm_marketing_tactic" type="text" name="utm_marketing_tactic" id="utm_marketing_tactic" autocomplete="utm_marketing_tactic" />
                            <div class="mt-1 text-sm text-gray-500">Used to send information on your particular marketing tactic for this ad, e.g. <em>onboarding</em>, <em>retention</em></div>
                        </div>
                    </div>

                    <div class=" sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5">
                        <div>
                            <label for="utm_marketing_tactic" class="block font-semibold leading-6 text-gray-900 sm:pt-1.5">Notes</label>
                            <span class="text-gray-500 text-sm">Optional</span>
                        </div>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <x-textarea wire:model.defer="notes" name="notes" id="notes" autocomplete="notes"></x-textarea>
                            <div class="mt-1 text-sm text-gray-500">Internal notes for this link in your UTM Wise dashboard.</div>
                        </div>
                    </div>

                </div>

                <div class="flex justify-center">
                    <x-button type="submit" class="items-center">
                        <span class="text-lg px-4">Create Link</span>
                        <svg wire:loading class="animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </x-button>
                </div>

            </form>

        @else 

            <div class="">
                <div class="px-4 py-5 sm:p-6 text-center">
                    <h3 class="text-2xl font-semibold leading-6 text-gray-900">🎉 Link created!</h3>
                    <div class="mt-6 mx-auto max-w-lg text-base text-gray-600">
                        <p>Your trackable link has been created! Click the text box below to copy it to your clipboard.</p>
                    </div>

                    <div class="my-6 mx-auto w-full lg:w-2/3 xl:w-1/2 transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-gray-50 shadow-lg ring-1 ring-black ring-opacity-5 transition-all">
                        <div class="relative">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                            </svg>    
                            <input @click.prevent="$el.focus(); $el.select(); window.navigator.clipboard.writeText('{{ $link->auto_url }}');" type="text" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0" value="{{ $link->full_url }}" />
                        </div>
                    </div>

                    <div class="mt-5 flex justify-center items-center gap-5">
                        <a href="{{ route('link.create', $domain['id']) }}">
                            <x-button-secondary type="button">Create another</x-button>
                        </a>
                        <a href="{{ route('domain.view', $domain['id']) }}">
                            <x-button-secondary type="button">Continue</x-button-secondary>
                        </a>
                    </div>
                </div>
            </div>

        @endif
    </div>
</div>