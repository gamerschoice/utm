<x-guest-layout>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <x-application-logo class="justify-center" />
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create your account</h2>
        </div>
        <x-authentication-card>

            <x-validation-errors class="mb-4" />

            <form class="space-y-6" method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <div class="mt-2">
                        <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                </div>

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <div class="mt-2">
                        <x-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" />
                    <div class="mt-2">
                        <x-input id="password" type="password" name="password" required autocomplete="new-password" />
                    </div>
                </div>

                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <div class="mt-2">
                        <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="flex items-center justify-between">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end">
                    <a class="shrink-0 text-sm font-medium text-blue-600 hover:text-blue-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4 w-full">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </div>
</x-guest-layout>
