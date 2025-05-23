<x-guest-layout>
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
        <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".2" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z"></path>
            <defs>
                <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                <stop stop-color="#60a5fa"></stop>
                <stop offset="1" stop-color="#60a5fa"></stop>
                </linearGradient>
            </defs>
        </svg>
    </div>
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

            <form class="flex flex-col gap-y-6" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <div class="mt-2">
                        <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <a class="shrink-0 text-sm font-medium text-blue-600 hover:text-blue-500" href="{{ route('login') }}">
                        {{ __('Back to login') }}
                    </a>
                    <x-button class="ml-4">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>

    </div>
</x-guest-layout>
