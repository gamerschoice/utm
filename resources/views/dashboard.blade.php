<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between border-b border-gray-300 py-6">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    <span class="font-mono">❤️</span> Welcome, {{ request()->user()->name }}
                </h1>
                <p class="text-lg pt-2 text-gray-500">Welcome to your dashboard. From here you can see a snapshot of your account data.</p>
            </div>
        </div>
    </x-slot>




<div class="flex flex-col py-8 lg:py-10 gap-y-10 lg:gap-y-14 ">

    <section class="flex flex-col gap-y-8 lg:gap-y-10">

        <div>
            <h3 class="text-xl font-semibold leading-6 text-gray-900">Your domains</h3>
            <p class="mt-2 text-lg text-gray-500">A selection of your recent domains.</p>
        </div>

        @if(!$domains->isEmpty())
            <div class="grid sm:grid-cols-3 gap-x-5 lg:gap-x-10">
                
                @foreach($domains as $domain)
                    <x-domain-card :domain="$domain" />
                @endforeach

                @if( !request()->user()->currentTeam->canRegisterDomain() )
                    
                    <div class="px-3 py-4 lg:px-6 lg:py-4 h-full max-h-[195px] flex items-center">
                        <a href="{{ route('domain.create') }}">
                            <div class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-9 text-center hover:border-gray-400 hover:bg-white transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                      

                                <span class="mt-2 block text-base font-semibold text-gray-900">Add another domain</span>
                            </div>
                        </a>
                    </div>

                @endif
            
            </div>
        @else 
            <div class="text-center p-12 rounded-lg border-2 border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
                <h3 class="mt-2 text-lg font-semibold text-gray-900">No domains</h3>
                <p class="mt-1 text-gray-500">Get started by creating a new domain for your links.</p>
                <div class="mt-6">
                    <a href="{{ route('domain.create') }}">
                        <button type="button" class="inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                            New Domain
                        </button>
                    </a>
                </div>
          </div>
          
        @endif

    </section>

</div>

</x-app-layout>
