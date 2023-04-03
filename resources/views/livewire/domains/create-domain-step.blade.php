<div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-10 mt-6">
    <!--<x-input wire:model.defer="domainName" type="text" />

    <x-button wire:click="createDomain" class="text-lg">  
        Register Domain
    </x-button>-->

    <div class="md:col-span-2 flex flex-col gap-8">

        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <p class="text-sm leading-6 font-medium text-gray-900">Enter your domain name to set up below. </p>
                <p class="text-sm leading-6 text-gray-600 mt-4">
                    Note, this is <strong>not</strong> your shortlink domain (you can set this up on the next step). This is the domain on which your ultimate destination URLs will sit. You should specify your <strong>root domain</strong> here (<span class="font-mono">mydomain.com</span>), and <strong>not</strong> a subdomain such as <span class="font-mono">www.mydomain.com</span>. This will enable you to create links for any of your domain's subdomains.
                </p>

                <div class="mt-4 max-w-xl text-gray-500 flex flex-col justify-start gap-4">

                    <div class="mt-2 w-full flex gap-5 lg:gap-10">
                        <x-input id="domain" type="text" wire:model.defer="domainName" placeholder="mydomain.com" required />
                        <x-button type="button" wire:click="createDomain" class="self-start">
                            Create
                            <svg wire:loading wire:target="createDomain" class="ml-1 animate-spin inline-block h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </x-button>

                    </div>
                    
                </div>

            </div>
        </div>

    </div>

</div>
