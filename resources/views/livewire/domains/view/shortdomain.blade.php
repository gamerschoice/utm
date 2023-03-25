<div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-10 mt-6">
	
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
				<h3 class="text-lg font-semibold leading-6 text-gray-900">Add or update your shortlink domain</h3>
				@if($errorMessage) <p class="text-red-500 mt-4">{{ $errorMessage }}</p> @endif
				<div class="mt-4 max-w-xl text-gray-500 flex gap-4">
					<x-input type="text" wire:model.defer="newShortlinkDomain" value="{{ $domain->shortlink_domain }}" placeholder="go.mydomain.com" />
					<x-button type="button" wire:click="saveShortlinkDomain">
						Save
                        <svg wire:loading class="ml-1 animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
					</x-button>
				</div>

			</div>
		</div>

    </div>

	@if($domain->shortlink_domain && $domain->shortlink_domain !== 'NULL')
		<div>

			<div class="bg-white shadow rounded-lg">

				<div class="px-4 py-5 sm:p-6">
					<h3 class="text-base font-semibold leading-6 text-gray-900">
						DNS Status: {{ $domain->shortlink_domain }}
					</h3>
					<div class="mt-2 max-w-xl text-sm text-gray-500 flex gap-5 py-4">
						@if($domain->dns_configured == 1)
							<p>Hooray! Your DNS is verified and your shortlink domain is active!</p>
							<svg class="shrink-0 inline-block w-16 h-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
							</svg>
						@else
							<p>There seems to a problem with your DNS settings. If you've recently set or updated your shortlink domain, please just be patient as this can sometimes take up to 24 hours to propagate. We'll continue to check the status of your domain every hour.</p>
							<svg class="shrink-0 inline-block w-16 h-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
						@endif
					</div>
				</div>

			</div>

		</div>
	@endif

</div>