<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <style>[x-cloak] { display: none !important; }</style>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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


            <div class="lg:ml-64 flex-1">
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
