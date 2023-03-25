<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased js-focus-visible scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTM Wise</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="twitter:site" content="@utmwise">
    <meta name="twitter:title" content="Get UTM Wise and take control of your link attribution">
    <meta name="twitter:description"
        content="Say goodbye to spreadsheets! UTM Wise lets you manage your site's UTM tracking links like a pro.">
    <meta name="twitter:image" content="https://utmwise.com/img/meta/social.png">
    <meta name="twitter:creator" content="@utmwise">
    <meta property="og:url" content="https://utmwise.com/">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Get UTM Wise and take control of your link attribution">
    <meta property="og:description"
        content="Say goodbye to spreadsheets! UTM Wise lets you manage your site's UTM tracking links like a pro.">
    <meta property="og:image" content="https://utmwise.com/img/meta/social.png">
    <meta property="description"
        content="Say goodbye to spreadsheets! UTM Wise lets you manage your site's UTM tracking links like a pro.">

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
            <!-- Hero section -->
            <div class="relative pt-14 bg-gradient-to-b from-blue-600 via-blue-400 to-gray-50 ">
                <div class="pt-24 sm:pt-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl text-center">
                            <h1 class="text-4xl font-black font-sans tracking-tight text-transparent sm:text-5xl xl:text-6xl text-white pb-8">Ditch spreadsheets
                                &amp; take control of link tracking.</h1>
                            <p class="mt-6 text-lg font-light leading-8 text-gray-50">Get UTM Wise and start managing your
                                tracking links and link attribution effectively. Use branded short links to give reassurance to your users.</p>
                            <div class="mt-10 flex items-center justify-center gap-x-6">
                                <a href="/register"
                                    class="inline-flex items-center rounded-md bg-white px-4 py-2 text-base font-semibold text-gray-900 shadow-sm  hover:bg-gray-50 transition ease-in-out duration-300">Get started for free</a>
                            </div>
                        </div>
                        <div class="mt-16 flow-root sm:mt-24">
                            <div
                                class="-m-2 rounded-xl bg-gradient-to-b from-gray-100/5 to-gray-50 p-2 ring-1 ring-inset ring-gray-100/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                                <img src="{{ asset('images/screenshot-create-link.jpg') }}" alt="App screenshot"
                                    width="2432" height="1442"
                                    class="rounded-md shadow-2xl ring-1 ring-gray-100/10">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Logo cloud -->
            <!--div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div
                    class="mx-auto grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-12 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 sm:gap-y-14 lg:mx-0 lg:max-w-none lg:grid-cols-5">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor"
                        width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform"
                        width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple"
                        width="158" height="48">
                    <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
                        src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal"
                        width="158" height="48">
                    <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                        src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic"
                        width="158" height="48">
                </div>
                <div class="mt-16 flex justify-center">
                    <p
                        class="relative rounded-full px-4 py-1.5 text-sm leading-6 text-gray-600 ring-1 ring-inset ring-gray-900/10 hover:ring-gray-900/20">
                        <span class="hidden md:inline">Transistor saves up to $40,000 per year, per employee by working
                            with us.</span>
                        <a href="#" class="font-semibold text-blue-600"><span class="absolute inset-0"
                                aria-hidden="true"></span> Read our case study <span
                                aria-hidden="true">&rarr;</span></a>
                    </p>
                </div>
            </div-->

            <!-- Feature section -->
            <div id="features" class="mx-auto mt-32 max-w-7xl px-6 sm:mt-56 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-lg font-semibold leading-7 text-gray-900">Features</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-blue-600 sm:text-4xl">Everything you need, to track like a boss</p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget
                        aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra
                        elit nunc.</p>
                </div>
                <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                    <dl class="grid max-w-xl grid-cols-1 gap-10 lg:max-w-none lg:grid-cols-2">

                        <x-feature-card>
                            <x-slot name="svg">
                                <svg class="h-6 w-6 stroke-gray-900 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">
                                Custom domain shortlinks
                            </x-slot>
                            <x-slot name="content">
                                With a quick DNS update, you can use whatever domain, or subdomain you want for your shortlinks. E.g. go.mydomain.com, mydmn.co
                            </x-slot>
                        </x-feature-card>

                        <x-feature-card>
                            <x-slot name="svg">
                                <svg class="h-6 w-6 stroke-gray-900 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">
                                Custom domain shortlinks
                            </x-slot>
                            <x-slot name="content">
                                With a quick DNS update, you can use whatever domain, or subdomain you want for your shortlinks. E.g. go.mydomain.com, mydmn.co
                            </x-slot>
                        </x-feature-card>

                        <x-feature-card>
                            <x-slot name="svg">
                                <svg class="h-6 w-6 stroke-gray-900 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">
                                Link wizard
                            </x-slot>
                            <x-slot name="content">
                                Create your links using our wizard to set sensible defaults and never worry about utm typos
                            </x-slot>
                        </x-feature-card>

                        <x-feature-card>
                            <x-slot name="svg">
                                <svg class="h-6 w-6 stroke-gray-900 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </x-slot>
                            <x-slot name="title">
                                Bulk import
                            </x-slot>
                            <x-slot name="content">
                                Mass import your links quickly using our bulk link importer. Set import presets for your source, campaign and medium, then customise each link with ease.
                            </x-slot>
                        </x-feature-card>


                    </dl>
                </div>
            </div>

            <!-- Testimonial section -->
            <div class="mx-auto mt-32 max-w-7xl sm:mt-56 sm:px-6 lg:px-8">
                <div
                    class="relative overflow-hidden bg-gray-900 py-20 px-6 shadow-xl sm:rounded-3xl sm:py-24 sm:px-10 md:px-12 lg:px-20">
                    <img class="absolute inset-0 h-full w-full object-cover brightness-150 saturate-0"
                        src="https://images.unsplash.com/photo-1601381718415-a05fb0a261f3?ixid=MXwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8ODl8fHxlbnwwfHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1216&q=80"
                        alt="">
                    <div class="absolute inset-0 bg-gray-900/90 mix-blend-multiply"></div>
                    <svg viewBox="0 0 1097 845" aria-hidden="true"
                        class="absolute -top-56 -left-80 w-[68.5625rem] transform-gpu blur-3xl">
                        <path fill="url(#68eb76c4-2bc9-4928-860e-70adf05719f4)" fill-opacity=".45"
                            d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                        <defs>
                            <linearGradient id="68eb76c4-2bc9-4928-860e-70adf05719f4" x1="1097.04" x2="-141.165"
                                y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#776FFF" />
                                <stop offset="1" stop-color="#FF4694" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <svg viewBox="0 0 1097 845" aria-hidden="true"
                        class="hidden md:absolute md:bottom-16 md:left-[50rem] md:block md:w-[68.5625rem] md:transform-gpu md:blur-3xl">
                        <path fill="url(#68eb76c4-2bc9-4928-860e-70adf05719f4)" fill-opacity=".25"
                            d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                    </svg>
                    <div class="relative mx-auto max-w-2xl lg:mx-0">
                        <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workcation-logo-white.svg"
                            alt="">
                        <figure>
                            <blockquote class="mt-6 text-lg font-semibold text-white sm:text-xl sm:leading-8">
                                <p>“Amet amet eget scelerisque tellus sit neque faucibus non eleifend. Integer eu
                                    praesent at a. Ornare arcu gravida natoque erat et cursus tortor consequat at.
                                    Vulputate gravida sociis enim nullam ultricies habitant malesuada lorem ac.”</p>
                            </blockquote>
                            <figcaption class="mt-6 text-base text-white">
                                <div class="font-semibold">Judith Black</div>
                                <div class="mt-1">CEO of Tuple</div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>

            <!-- Pricing section -->
            <div id="pricing" class="py-24 sm:pt-48">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-4xl text-center">
                        <h2 class="text-base font-semibold leading-7 text-blue-600">Pricing</h2>
                        <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Pricing plans for
                            teams of&nbsp;all&nbsp;sizes</p>
                    </div>
                    <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-600">Distinctio et nulla
                        eum soluta et neque labore quibusdam. Saepe et quasi iusto modi velit ut non voluptas in.
                        Explicabo id ut laborum.</p>
                    <div
                        class="isolate mx-auto mt-16 grid max-w-md grid-cols-1 gap-y-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                        <div
                            class="flex flex-col justify-between rounded-3xl bg-white p-8 ring-1 ring-gray-200 xl:p-10 lg:mt-8 lg:rounded-r-none">
                            <div>
                                <div class="flex items-center justify-between gap-x-4">
                                    <h3 id="tier-freelancer" class="text-lg font-semibold leading-8 text-gray-900">
                                        Personal</h3>
                                </div>
                                <p class="mt-4 text-sm leading-6 text-gray-600">The essentials to provide your best
                                    work for clients.</p>
                                <p class="mt-6 flex items-baseline gap-x-1">
                                    <span class="text-4xl font-bold tracking-tight text-gray-900">£9</span>
                                    <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
                                </p>
                                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        5 products
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Up to 1,000 subscribers
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Basic analytics
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        48-hour support response time
                                    </li>
                                </ul>
                            </div>
                            <a href="#" aria-describedby="tier-freelancer"
                                class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 text-blue-600 ring-1 ring-inset ring-blue-200 hover:ring-blue-300">Buy
                                plan</a>
                        </div>

                        <div
                            class="flex flex-col justify-between rounded-3xl bg-white p-8 ring-1 ring-gray-200 xl:p-10 lg:z-10 lg:rounded-b-none">
                            <div>
                                <div class="flex items-center justify-between gap-x-4">
                                    <h3 id="tier-startup" class="text-lg font-semibold leading-8 text-blue-600">
                                        Premium</h3>

                                    <p
                                        class="rounded-full bg-blue-600/10 py-1 px-2.5 text-xs font-semibold leading-5 text-blue-600">
                                        Most popular</p>
                                </div>
                                <p class="mt-4 text-sm leading-6 text-gray-600">A plan that scales with your rapidly
                                    growing business.</p>
                                <p class="mt-6 flex items-baseline gap-x-1">
                                    <span class="text-4xl font-bold tracking-tight text-gray-900">£20</span>
                                    <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
                                </p>
                                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        25 products
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Up to 10,000 subscribers
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Advanced analytics
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        24-hour support response time
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Marketing automations
                                    </li>
                                </ul>
                            </div>
                            <a href="#" aria-describedby="tier-startup"
                                class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 bg-blue-600 text-white shadow-sm hover:bg-blue-500">Buy
                                plan</a>
                        </div>

                        <div
                            class="flex flex-col justify-between rounded-3xl bg-white p-8 ring-1 ring-gray-200 xl:p-10 lg:mt-8 lg:rounded-l-none">
                            <div>
                                <div class="flex items-center justify-between gap-x-4">
                                    <h3 id="tier-enterprise" class="text-lg font-semibold leading-8 text-gray-900">
                                        Agency</h3>
                                </div>
                                <p class="mt-4 text-sm leading-6 text-gray-600">Everything you need to service every one of your clients.</p>
                                <p class="mt-6 flex items-baseline gap-x-1">
                                    <span class="text-4xl font-bold tracking-tight text-gray-900">£45</span>
                                    <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
                                </p>
                                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Unlimited products
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Unlimited subscribers
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Advanced analytics
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        1-hour, dedicated support response time
                                    </li>

                                    <li class="flex gap-x-3">
                                        <svg class="h-6 w-5 flex-none text-blue-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Marketing automations
                                    </li>
                                </ul>
                            </div>
                            <a href="#" aria-describedby="tier-enterprise"
                                class="mt-8 block rounded-md py-2 px-3 text-center text-sm font-semibold leading-6 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 text-blue-600 ring-1 ring-inset ring-blue-200 hover:ring-blue-300">Buy
                                plan</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            <section id="reviews" aria-labelledby="reviews-title" class="py-24 sm:pt-48">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-4xl text-center">
                        <h2 class="text-base font-semibold leading-7 text-blue-600">Reviews</h2>
                        <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Our customers love
                            it</p>
                    </div>
                    <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-600">Distinctio et nulla
                        eum soluta et neque labore quibusdam. Saepe et quasi iusto modi velit ut non voluptas in.
                        Explicabo id ut laborum.</p>
                    <div
                        class="relative -mx-4 mt-16 grid h-[49rem] max-h-[150vh] grid-cols-1 items-start gap-8 overflow-hidden px-4 sm:mt-20 md:grid-cols-2 lg:grid-cols-3">
                        <div class="animate-marquee space-y-8 py-4" style="--marquee-duration:28320ms;">
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                        </div>
                        <div class="animate-marquee space-y-8 py-4 hidden md:block"
                            style="--marquee-duration:40800ms;">
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Lorem ipsum dolor sit amet.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                        </div>
                        <div class="animate-marquee space-y-8 py-4 hidden lg:block"
                            style="--marquee-duration:22880ms;">
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">It really works.</x-slot>
                                <x-slot name="content">I downloaded Pocket today and turned $5000 into $25,000 in half
                                    an hour.</x-slot>
                                <x-slot name="author">CrazyInvestor</x-slot>
                            </x-review-card>
                        </div>
                        <div class="pointer-events-none absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-bg-gray-50">
                        </div>
                        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-bg-gray-50">
                        </div>
                    </div>
                </div>
            </section>


            <!-- FAQs -->
            <div id="faqs"
                class="mx-auto max-w-2xl divide-y divide-gray-900/10 px-6 pb-8 sm:pt-12 sm:pb-24 lg:max-w-7xl lg:px-8 lg:pb-32">
                <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Frequently asked questions</h2>
                <dl class="mt-10 space-y-8 divide-y divide-gray-900/10">
                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">What&#039;s the best
                            thing about Switzerland?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">I don&#039;t know, but the flag is a big plus.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam
                                fugiat.</p>
                        </dd>
                    </div>

                    <!-- More questions... -->
                </dl>
            </div>

            <!-- CTA section -->
            <div class="relative -z-10 mt-32 px-6 lg:px-8">
                <div
                    class="absolute inset-x-0 top-1/2 -z-10 flex -translate-y-1/2 transform-gpu justify-center overflow-hidden blur-3xl sm:right-[calc(50%-6rem)] sm:top-auto sm:bottom-0 sm:translate-y-0 sm:transform-gpu sm:justify-end">
                    <svg viewBox="0 0 1108 632" aria-hidden="true" class="w-[69.25rem] flex-none">
                        <path fill="url(#191ef669-4d29-44ea-9496-5d65eb27150d)" fill-opacity=".25"
                            d="M235.233 229.055 57.541 310.091.83.615l234.404 228.44L555.251 83.11c-65.036 115.261-134.286 322.756 109.01 230.655C968.382 198.638 1031-19.583 1092.23 172.304c48.98 153.51-34.51 321.107-82.37 385.717L810.952 307.442 648.261 631.576 235.233 229.055Z" />
                        <defs>
                            <linearGradient id="191ef669-4d29-44ea-9496-5d65eb27150d" x1="1220.59" x2="-85.053"
                                y1="198.898" y2="-7.05" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#38bdf8" />
                                <stop offset="1" stop-color="#0ea5e9" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Boost your
                        productivity.<br>Get UTM Wise today.</h2>
                    <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-600">Incididunt sint fugiat pariatur
                        cupidatat consectetur sit cillum anim id veniam aliqua proident excepteur commodo do ea.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="#"
                            class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            Get started for free</a>
                    </div>
                </div>
                <div
                    class="absolute left-1/2 right-0 top-full -z-10 hidden -translate-y-1/2 transform-gpu overflow-hidden blur-3xl sm:block">
                    <svg viewBox="0 0 1155 678" aria-hidden="true" class="w-[72.1875rem]">
                        <path fill="url(#23e1b96e-c791-45fa-975a-a04d29498207)" fill-opacity=".3"
                            d="M317.219 518.975 203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079Z" />
                        <defs>
                            <linearGradient id="23e1b96e-c791-45fa-975a-a04d29498207" x1="1155.49" x2="-78.208"
                                y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#38bdf8" />
                                <stop offset="1" stop-color="#0ea5e9" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <div class="mx-auto mt-32 max-w-7xl px-6 lg:px-8">
            <footer aria-labelledby="footer-heading"
                class="relative border-t border-gray-900/10 py-24 sm:mt-56 sm:py-32">
                <h2 id="footer-heading" class="sr-only">Footer</h2>
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <img class="h-7" src="https://tailwindui.com/img/logos/mark.svg?color=blue&shade=600"
                        alt="Company name">
                    <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">

                        <ul role="list" class="mt-6 space-y-4">

                            <li>
                                <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Blog</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-sm leading-6 text-gray-600 hover:text-gray-900">Terms</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="text-sm leading-6 text-gray-600 hover:text-gray-900">Privacy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>


</body>

</html>
