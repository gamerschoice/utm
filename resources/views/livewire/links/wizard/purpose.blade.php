

<div class="flex flex-col pt-5 lg:pt-8 gap-y-5 lg:gap-y-8">

    <x-steps :steps="$steps" />

    <div class="text-center w-full lg:w-2/3 mx-auto">
        <h2 class="text-xl font-bold mb-2">Your campaign name</h2>
        <p class="text-sm text-gray-600 font-medium">This could be something like <em>summer-rebrand-promotion</em>.</p>
    </div>

    <div class="mx-auto w-full lg:w-1/2 transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 transition-all">
        <div class="relative">
            <input x-on:keyup.prevent="$el.value = $el.value.replace(/\s+/g, '+').toLowerCase()" required type="text" wire:model="campaign" name="campaign" class="text-center h-12 w-full border-0 bg-transparent px-6 text-gray-900 placeholder:text-gray-400 focus:ring-0" placeholder="2023-summer-rebrand">
        </div>
                    
        @if(!empty($campaigns) && strlen($campaign) >= 3)
            <ul class="max-h-72 scroll-py-2 overflow-y-auto py-2 text-sm text-gray-800" id="options" role="listbox">
                @foreach($campaigns as $campaign)
                    <li wire:click="setCampaign('{{ $campaign }}')" class="hover:bg-blue-600 hover:text-white cursor-default select-none px-4 py-2" id="option-1" role="option" tabindex="-1">{{ $campaign }}</li>
                @endforeach
            </ul>
        @endif
    </div>




    <div class="text-center w-full lg:w-2/3 mx-auto">
        <h2 class="text-xl font-bold mb-2">Choose your campaign type</h2>
        <p class="text-sm text-gray-600 font-medium">This will help us set up sensible defaults for your link. If you're not worried about this, choose Custom.</p>
    </div>

    <fieldset x-data="LinkPurpose()" class="flex flex-col gap-y-5 lg:gap-y-8">

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">

            <label 
                :class="{ 'border-blue-600 ring-2 ring-blue-600' : (purpose === 'social') , 'border-gray-300' : !(purpose === 'social') }"
                class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                <input x-model="purpose" wire:model.defer="purpose" type="radio" name="purpose" value="social" class="sr-only" aria-labelledby="project-type-0-label" aria-describedby="project-type-0-description-0 project-type-0-description-1">
                <div class="flex flex-1 gap-5 items-center">
                    <div>
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </div>
                    <span class="flex flex-1">
                        <span class="flex flex-col">
                            <span class="block text-lg font-medium text-gray-900">Social media</span>
                            <span class="mt-1 flex items-center text-sm text-gray-500">For use in social media campaigns</span>
                        </span>
                    </span>
                </div>
                <svg x-cloak="" x-show="purpose === 'social'" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>

                <span :class="{ 'border-2 border-blue-600' : (purpose === 'social'), 'border border-transparent' : !(purpose === 'social') }" class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
            </label>

              
            <label 
                :class="{ 'border-blue-600 ring-2 ring-blue-600' : (purpose === 'email') , 'border-gray-300' : !(purpose === 'email') }"
                class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                <input x-model="purpose" wire:model.defer="purpose" type="radio" name="purpose" value="email" class="sr-only" aria-labelledby="project-type-0-label" aria-describedby="project-type-0-description-0 project-type-0-description-1">
                <div class="flex flex-1 gap-5 items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <span class="flex flex-1">
                        <span class="flex flex-col">
                            <span class="block text-lg font-medium text-gray-900">Email</span>
                            <span class="mt-1 flex items-center text-sm text-gray-500">For links used within outgoing emails.</span>
                        </span>
                    </span>
                </div>

                <svg x-cloak="" x-show="purpose === 'email'" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>

                <span :class="{ 'border-2 border-blue-600' : (purpose === 'email'), 'border border-transparent' : !(purpose === 'email') }" class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
            </label>

            <label 
                :class="{ 'border-blue-600 ring-2 ring-blue-600' : (purpose === 'cpc') , 'border-gray-300' : !(purpose === 'cpc') }"
                class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                <input x-model="purpose" wire:model.defer="purpose" type="radio" name="purpose" value="cpc" class="sr-only" aria-labelledby="project-type-0-label" aria-describedby="project-type-0-description-0 project-type-0-description-1">
                <div class="flex flex-1 gap-5 items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                        </svg>                          
                    </div>
                    <span class="flex flex-1">
                        <span class="flex flex-col">
                            <span class="block text-lg font-medium text-gray-900">Cost-Per-Click</span>
                            <span class="mt-1 flex items-center text-sm text-gray-500">Used to identify your paid traffic.</span>
                        </span>
                    </span>
                </div>

                <svg x-cloak="" x-show="purpose === 'cpc'" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>

                <span :class="{ 'border-2 border-blue-600' : (purpose === 'cpc'), 'border border-transparent' : !(purpose === 'cpc') }" class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
            </label>

            <label 
                :class="{ 'border-blue-600 ring-2 ring-blue-600' : (purpose === 'affiliate') , 'border-gray-300' : !(purpose === 'affiliate') }"
                class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                <input x-model="purpose" wire:model.defer="purpose" type="radio" name="purpose" value="affiliate" class="sr-only" aria-labelledby="project-type-0-label" aria-describedby="project-type-0-description-0 project-type-0-description-1">
                <div class="flex flex-1 gap-5 items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="flex flex-1">
                        <span class="flex flex-col">
                            <span class="block text-lg font-medium text-gray-900">Affiliate</span>
                            <span class="mt-1 flex items-center text-sm text-gray-500">For links used to identify affiliate traffic.</span>
                        </span>
                    </span>
                </div>

                <svg x-cloak="" x-show="purpose === 'affiliate'" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>

                <span :class="{ 'border-2 border-blue-600' : (purpose === 'affiliate'), 'border border-transparent' : !(purpose === 'affiliate') }" class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
            </label>

            <label 
                :class="{ 'border-blue-600 ring-2 ring-blue-600' : (purpose === 'banner') , 'border-gray-300' : !(purpose === 'banner') }"
                class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                <input x-model="purpose" wire:model.defer="purpose" type="radio" name="purpose" value="banner" class="sr-only" aria-labelledby="project-type-0-label" aria-describedby="project-type-0-description-0 project-type-0-description-1">
                <div class="flex flex-1 gap-5 items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>                          
                    </div>
                    <span class="flex flex-1">
                        <span class="flex flex-col">
                            <span class="block text-lg font-medium text-gray-900">Banner</span>
                            <span class="mt-1 flex items-center text-sm text-gray-500">For links coming from your banner ads.</span>
                        </span>
                    </span>
                </div>

                <svg x-cloak="" x-show="purpose === 'banner'" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>

                <span :class="{ 'border-2 border-blue-600' : (purpose === 'banner'), 'border border-transparent' : !(purpose === 'banner') }" class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
            </label>

            <label 
                :class="{ 'border-blue-600 ring-2 ring-blue-600' : (purpose === 'custom') , 'border-gray-300' : !(purpose === 'custom') }"
                class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                <input x-model="purpose" wire:model.defer="purpose" type="radio" name="purpose" value="custom" class="sr-only" aria-labelledby="project-type-0-label" aria-describedby="project-type-0-description-0 project-type-0-description-1">
                <div class="flex flex-1 gap-5 items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42" />
                        </svg>                                               
                    </div>
                    <span class="flex flex-1">
                        <span class="flex flex-col">
                            <span class="block text-lg font-medium text-gray-900">Custom</span>
                            <span class="mt-1 flex items-center text-sm text-gray-500">Skip the defaults and decide for yourself.</span>
                        </span>
                    </span>
                </div>

                <svg x-cloak="" x-show="purpose === 'custom'" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>

                <span :class="{ 'border-2 border-blue-600' : (purpose === 'custom'), 'border border-transparent' : !(purpose === 'custom') }" class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></span>
            </label>

        </div>


        <div class="flex justify-center">
            <x-button wire:loading.attr="disabled" type="button" wire:click="validatePurpose" class="items-center">
                <span class="text-lg px-4">Next</span>
                <svg wire:loading class="animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </x-button>
        </div>

    </fieldset>
      
    <script>
        window.LinkPurpose = () => {
            return {
                purpose: 'custom',
            }
        }
    </script>
</div>
