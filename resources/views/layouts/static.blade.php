<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased js-focus-visible scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{ $meta }}
    
    <link rel="icon" href="{{ asset('favicon.jpg') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GA4_ID') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ env('GA4_ID') }}');
    </script>
</head>

<body class="flex h-full flex-col" x-data="{ burgerOpen: false }">

    <div class="bg-gray-50">

        <x-marketing.header />

        <main class="isolate">

            <div class="relative py-20 bg-gradient-to-b from-blue-600 via-blue-400 to-gray-50 ">
                <div class="pt-24 sm:pt-32 pb-24">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl text-center">
                            {{ $masthead }}
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="max-w-7xl py-20 mx-5 sm:mx-auto">
                {{ $slot }}
            </div>


        </main>
        <x-marketing.footer />
    </div>
</body>
</html>