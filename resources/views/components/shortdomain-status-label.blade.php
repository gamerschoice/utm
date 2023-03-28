@props([
    'shortdomain'
])
<div {{ $attributes->merge(['class' => 'inline-block']) }}>
    @if($shortdomain)

        @if( $shortdomain->status === 'active')        
            <div class="shrink-0 inline-flex gap-x-1 items-center cursor-default  rounded-full bg-green-100 px-2.5 py-0.5 font-medium text-green-800">
                <span>{{ $shortdomain->host }}</span>
                <svg class="inline-block w-3 h-3 text-green-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                </svg>
            </div>
        @else 
            <div class="shrink-0 inline-flex gap-x-1 items-center cursor-default  rounded-full bg-blue-100 px-2.5 py-0.5 font-medium text-blue-800">
                <span>{{ $shortdomain->host }}</span>
                <svg class="w-3 h-3 text-blue-800" viewBox="0 0 20 20" fill="currentColor" >
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                </svg>    
            </div>
        @endif

    @else 
        <div class="shrink-0 inline-flex gap-x-1 items-center cursor-default rounded-full bg-yellow-100 px-2.5 py-0.5 font-medium text-yellow-800">
            <span>no shortlink domain</span>
            <svg class=" inline-block w-3 h-3 text-yellow-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    @endif 
</div>