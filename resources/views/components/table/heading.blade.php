@props([
    'sortable' => null,
    'direction' => null,
])

<th scope="col" {{ $attributes->merge(['class' => 'px-3 py-3.5 text-left text-sm font-semibold text-gray-900'])->only('class') }}>
    @unless ($sortable)
        {{ $slot }}
    @else 
        <button {{ $attributes->except('class') }} class="group flex items-center space-x-1">
            <span>{{ $slot }}</span>
            @if($direction === 'asc')
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            @elseif($direction === 'desc')
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            @else 
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 opacity-0 group-hover:opacity-100 transition duration-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            @endif
        </button>
    @endif

</th>