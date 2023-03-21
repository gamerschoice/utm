<x-guest-layout>
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <x-application-logo class="justify-center" />
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Forgot Password</h2>
        </div>

        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <div class="mt-2">
                        <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <a class="shrink-0 text-sm font-medium text-blue-600 hover:text-blue-500" href="{{ route('login') }}">
                        {{ __('< Back to login') }}
                    </a>
                    <x-button class="ml-4">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>

    </div>
</x-guest-layout>
