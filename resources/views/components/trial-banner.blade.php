@if(auth()->user()->currentTeam->plan->sku === 'trial')

<div class="relative isolate flex justify-center items-center gap-x-6 overflow-hidden bg-blue-600 py-2.5 px-6 sm:px-3.5">

    <div class="flex flex-wrap justify-center items-center gap-y-2 gap-x-4">
        <p class="text-sm leading-6 text-white">
            <strong class="font-semibold">Trial plan</strong>
            <span>&bull;</span>
            <span class="text-sm">You're currently on a resource-limited trial plan. To get the full experience, upgrade to a paid plan.</span>
        </p>
        @if(request()->user()->ownsTeam(request()->user()->currentTeam))
        <a href="{{ route('billing') }}">
            <x-button-secondary>
                Upgrade now 
            </x-button-secondary>
        </a>
        @endif
    </div>

</div>

@endif