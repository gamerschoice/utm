@props([
    'domain'
])

<div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
    <div class="p-4 flex justify-between items-center gap-5">
        <h3 class="text-gray-900 font-bold text-xl truncate"><a href="{{ route('domain.view', $domain) }}">{{ $domain->domain }}</a></h3>
        
        <x-shortdomain-status-label class="text-xs" :shortdomain="$domain->shortdomain" />

    </div>
    
    @if($domain->links->isNotEmpty())
        <div class="px-3 py-4 lg:px-6 lg:py-4 h-full max-h-[195px] flex items-start">
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
        </div>
    @else 
        <div class="px-3 py-4 lg:px-6 lg:py-4 h-full max-h-[195px] flex items-center">
            <div class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-9 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                </svg>  
                <span class="mt-2 block text-base font-semibold text-gray-900">No links found</span>
            </div>
        </div>
    @endif

    <div class="p-4 flex justify-end gap-2 items-center bg-gray-50">
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