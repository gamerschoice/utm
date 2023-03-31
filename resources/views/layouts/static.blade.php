<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased js-focus-visible scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTM Wise</title>
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
    <meta name="twitter:site" content="@utmwise">
    <meta name="twitter:title" content="Get UTM Wise and take control of your link tracking">
    <meta name="twitter:description"
        content="Say goodbye to spreadsheets! UTM Wise lets you manage your site's UTM tracking links like a pro.">
    <meta name="twitter:image" content="https://utmwise.com/img/meta/social.png">
    <meta name="twitter:creator" content="@utmwise">
    <meta property="og:url" content="https://utmwise.com/">
    <meta property="og:title" content="Get UTM Wise and take control of your link tracking">
    <meta property="og:description" content="Say goodbye to spreadsheets! UTM Wise lets you manage your site's UTM tracking links like a pro.">
    <meta property="og:image" content="https://utmwise.com/img/meta/social.png">
    <meta property="description" content="Say goodbye to spreadsheets! UTM Wise lets you manage your site's UTM tracking links like a pro.">
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
        <!-- Header -->
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1 relative z-10">
                    <a href="/" class="-m-1.5 p-1.5">
                        <x-application-mark-dark />
                    </a>
                </div>
                <!--div class="flex lg:hidden">
                    <button @click="burgerOpen = true" type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div-->
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#features" class="font-semibold leading-6 text-white hover:bg-gray-100/5 rounded-md py-1 px-3 transition-colors ease-in-out">Features</a>

                    <a href="#pricing" class="font-semibold leading-6 text-white hover:bg-gray-100/5 rounded-md py-1 px-3 transition-colors ease-in-out">Pricing</a>

                    <a href="#reviews" class="font-semibold leading-6 text-white hover:bg-gray-100/5 rounded-md py-1 px-3 transition-colors ease-in-out">Reviews</a>

                    <a href="#faqs" class="font-semibold leading-6 text-white hover:bg-gray-100/5 rounded-md py-1 px-3 transition-colors ease-in-out">FAQs</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="#" class="font-semibold leading-6 text-white hover:bg-white/10 rounded-md py-1 px-3 transition-colors ease-in-out">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
                <div class="flex items-center gap-6">
                    <div class="lg:hidden">
                        <button @click="burgerOpen = !burgerOpen" class="relative z-10 -m-2 inline-flex items-center rounded-lg stroke-white p-2 bg-white/10 [&amp;:not(:focus-visible)]:focus:outline-none" aria-label="Toggle site navigation" type="button" aria-expanded="false">
                            <svg x-show="!burgerOpen" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6"><path d="M5 6h14M5 18h14M5 12h14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            <svg x-show="burgerOpen" x-cloak viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6"><path d="M17 14l-5-5-5 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </button>
                        <div x-show="burgerOpen" x-cloak class="fixed inset-0 z-0 bg-gray-300/10 backdrop-blur"
                            x-transition:enter="transition-opacity ease-linear duration-300" 
                            x-transition:enter-start="opacity-0" 
                            x-transition:enter-end="opacity-100" 
                            x-transition:leave="transition-opacity ease-linear duration-300" 
                            x-transition:leave-start="opacity-100" 
                            x-transition:leave-end="opacity-0" ></div>
                        <div x-show="burgerOpen" x-cloak class="absolute inset-x-0 top-0 z-0 origin-top rounded-b-2xl bg-gray-900 px-6 pb-6 pt-28 shadow-2xl shadow-gray-900/20" 
                            x-transition:enter="transition ease-linear duration-300" 
                            x-transition:enter-start="opacity-0 -translate-y-10" 
                            x-transition:enter-end="opacity-100 translate-y-0" 
                            x-transition:leave="transition ease-linear duration-300" 
                            x-transition:leave-start="opacity-100 translate-y-0" 
                            x-transition:leave-end="opacity-0 -translate-y-10">
                            <div class="space-y-4">
                                <a class="block text-base leading-7 tracking-tight text-white" href="/#features">Features</a>
                                <a class="block text-base leading-7 tracking-tight text-white" href="/#pricing">Pricing</a>
                                <a class="block text-base leading-7 tracking-tight text-white" href="/#reviews">Reviews</a>
                                <a class="block text-base leading-7 tracking-tight text-white" href="/#faqs">FAQs</a>
                            </div>
                            <div class="mt-8 flex flex-col gap-4">
                                <a class="inline-flex justify-center rounded-lg border py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-sm transition-colors bg-transparent border-white text-white hover:border-white" href="/login">Log in</a>
                                <a class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-none transition-colors bg-white text-gray-900 hover:bg-gray-50" href="/register">Get started free</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

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