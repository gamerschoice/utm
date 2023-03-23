@props([
    'domain'
])

<div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
    <div class="px-4 py-5 sm:px-6 flex justify-between items-center gap-5">
        <h3 class="text-gray-900 font-bold text-xl truncate"><a href="{{ route('domain.view', $domain) }}">{{ $domain->domain }}</a></h3>
        
        @if($domain->dns_configured === 1)
            <div class="flex gap-x-2 items-center bg-green-500 px-2 py-1 rounded-md border border-green-400">
                <span class="cursor-default text-xs text-white font-light">{{ $domain->shortlink_domain }}</span>
                <svg class="inline-block w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                </svg>
            </div>
        @else 
            <div class="flex gap-x-2 items-center bg-red-500 px-2 py-1 rounded-md border border-red-400">
                <span class="cursor-default text-xs text-white font-light">no short domain</span>
                <svg class=" inline-block w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        @endif 

    </div>
    <div class="px-3 py-4 lg:px-6 lg:py-4 h-full max-h-[195px] flex items-center">
        @if($domain->links->isNotEmpty())
            <ul role="list" class="-my-4 divide-y divide-gray-200 w-full">
                @foreach($domain->links as $link)
                <li class="py-4 cursor-default">
                    <div class="flex items-center space-x-4">
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-xs font-medium text-gray-900">{{ $link->destination}}</p>
                            <p class="truncate text-xs text-gray-500">
                                @if($link->utm_source) {{ $link->utm_source}} &bull; @endif
                                @if($link->utm_medium) {{ $link->utm_medium}} &bull; @endif
                                @if($link->utm_campaign) {{ $link->utm_campaign}} @endif
                            </p>
                        </div>
                        <div>
                            <button x-data="{ copied: false }" @click.prevent="window.navigator.clipboard.writeText('{{ $link->auto_url }}'); copied = true; setTimeout( function() { copied = false }, 3000);" type="button" class="inline-flex items-center rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                <span x-show="!copied">Copy</span>
                                <span x-show="copied" x-cloak>Copied</span>
                            </button>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        @else 
            <div class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-9 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                </svg>  
                <span class="mt-2 block text-base font-semibold text-gray-900">No links found</span>
            </div>
        @endif
    </div>
    <div class="px-4 py-3 sm:px-6 flex justify-end gap-2 items-center bg-gray-50">
        <a href="{{ route('domain.view', $domain) }}">
            <x-button-secondary>
                All links
            </x-button-secondary>
        </a>
        <a href="{{ route('link.create', $domain->id) }}">
            <x-button>
                Create link
            </x-button>
        </a>        
    </div>
</div>