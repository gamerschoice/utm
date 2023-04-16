<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <style>[x-cloak=""] { display: none !important; }@media screen and (max-width: 1024px) {[x-cloak="mob"] { display: none!important; }}</style>
        <link rel="icon" href="{{ asset('favicon.jpg') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GA4_ID') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ env('GA4_ID') }}');
        </script>
        @stack('scripts')
    </head>
    <body class="font-sans antialiased h-full">
        


        <div x-data="{ open: false }" @keydown.window.escape="open = false">
            
            @livewire('app-navigation-menu')

            <div x-cloak="" x-show="open"
            x-transition:enter="ease-out duration-700"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-700"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="lg:hidden backdrop-blur w-full h-full fixed z-40 bg-transparent top-0 left-0"></div>


            <div class="lg:ml-64 flex-1 mt-[65px] lg:mt-0">

                <x-trial-banner />

                <div class="py-6">
                    <header>
                        @if (isset($header))
                            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        @endif
                    </header>
                    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        
                        <x-banner />

                        {{ $slot }}

                    </main>
                </div>
            </div>
            

        </div>

        @livewire('notifications')

        @stack('modals')

        @livewireScripts
        @stack('footer-scripts')
    </body>
</html>
