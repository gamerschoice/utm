<div>
    <x-section-border />

    <x-form-section submit="checkDnsRecords">
        <x-slot name="title">
            {{ __('DNS Settings') }}
        </x-slot>

        <x-slot name="description">
            {{ __('DNS Settings to allow https://go.yourwebsite.com to function as your link redirector.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <p>Please add the following record to your DNS.</p>
                <p>CNAME SOMETING OR OTHER</p>
                <p>Once you have added these records to your DNS, click the verify button.</p>

                @if($status)
                    DNS Detected
                @else
                    DNS Not Detected
                @endif

                @if($verification) 
                    <p>{{ $verification->status }}: Started {{ $verification->created_at->diffForHumans() }}</p>
                @endif
            </div>
        </x-slot>

        @if (Gate::check('update', $domain))
            <x-slot name="actions">
                <x-action-message class="mr-3" on="saved">
                    {{ __('Verifying.') }}
                </x-action-message>

                <x-button>
                    {{ __('Verify DNS') }}
                </x-button>
            </x-slot>
        @endif
    </x-form-section>
</div>