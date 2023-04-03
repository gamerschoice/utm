<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-10 mt-6">
	
        @if(auth()->user()->currentTeam->plan->sku === 'trial')

		    <x-feature-unavailable-trial />

	    @else 

            <div class="md:col-span-2 flex flex-col gap-8">
        
                <div class="rounded-md bg-yellow-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-medium text-yellow-800">Attention</h3>
                            <div class="mt-2 text-base text-yellow-700 leading-normal">
                                <p class="mb-4">Before setting or updating your custom shortlink domain, please ensure you have updated the domain's DNS record(s) accordingly.</p>
                                <p class="mb-4">For whichever domain or subdomain you wish to use, (for example, <span class="font-mono font-sm">go.mydomain.com</span> or <span class="font-mono font-sm">mydmn.co</span>) please set a <span class="inline-block bg-gray-100 px-2 py-1 rounded-md ring-1 ring-inset ring-gray-300 text-red-500 font-mono">CNAME</span> record with a value of <span class="inline-block bg-gray-100 px-2 py-1 rounded-md ring-1 ring-inset ring-gray-300 text-red-500 font-mono">{{ env('DNS_CNAME') }}</span> </p>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">Setup a Custom Shortlink Domain</h3>
                        @if($errorMessage) <p class="text-red-500 mt-4">{{ $errorMessage }}</p> @endif
                        <div class="mt-4 max-w-xl text-gray-500 flex gap-4">
                            <x-input type="text" wire:model.defer="newShortlinkDomain" value="{{ $domain->shortdomain ? $domain->shortdomain->host : '' }}" placeholder="go.mydomain.com" />
                            <x-button type="button" wire:click="saveShortlinkDomain">
                                Verify
                                <svg wire:loading class="ml-1 animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </x-button>
                        </div>
        
                    </div>
                </div>
        
            </div>
    
        @endif 

    </div>
</div>
