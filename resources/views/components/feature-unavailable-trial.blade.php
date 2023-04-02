<div class="rounded-md bg-yellow-50 p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-8 w-8 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-lg font-medium text-yellow-800">Unavailable on Free Trial</h3>
            <div class="mt-2 text-sm text-yellow-700 leading-normal">
                <p class="mb-4">Sorry! This feature is only available for active subscription plans and not for trial accounts.</p>
                <div>
                    <a href="{{ route('billing') }}">
                        <x-button-secondary>Upgrade</x-button-secondary>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>