@props([
    'link'
])

@if($link->health_checked_at)
    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium link-status--{{ $link->health_status_code }}">{{ $link->health_status_code }}</span>
@else
    <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">queued</span>
@endif