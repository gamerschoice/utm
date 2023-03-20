@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex items-center rounded-md px-2 py-2 text-sm font-medium bg-gray-100 text-gray-900'
            : 'group flex items-center rounded-md px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
<a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center rounded-md px-2 py-2 text-sm font-medium">

  </a>