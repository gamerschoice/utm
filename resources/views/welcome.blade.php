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
    <meta name="twitter:description" content="Say goodbye to spreadsheets! UTM Wise lets you manage your site's UTM tracking links like a pro.">
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

        <x-marketing.header />

        <main class="isolate">
            <!-- Hero section -->
            <div class="relative pt-14 bg-gradient-to-b from-blue-600 via-blue-400 to-gray-50 ">
                <div class="pt-24 sm:pt-32">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl text-center">
                            <h1 class="text-4xl font-black font-sans tracking-tight text-transparent sm:text-5xl xl:text-6xl text-white pb-8">Ditch spreadsheets
                                &amp; <span class="underline decoration decoration-blue-300 decoration-4">take control</span> of link tracking.</h1>
                            <p class="mt-6 text-lg font-light leading-8 text-gray-50">Get UTM Wise and start managing your
                                tracking links and link attribution effectively. Use branded short links to give reassurance to your users.</p>
                            <div class="mt-10 flex items-center justify-center gap-x-6">
                                <a href="/register"
                                    class="inline-flex items-center rounded-md bg-white px-4 py-2 text-base font-semibold text-gray-900 shadow-sm  hover:bg-gray-50 transition ease-in-out duration-300 hover:scale-105">Get started for free</a>
                            </div>
                        </div>
                        <div class="mt-16 flow-root sm:mt-24">
                            <div
                                data-aos="zoom-in-up" data-aos-delay="1200" data-aos-duration="1200"
                                class="-m-2 rounded-xl bg-gradient-to-b from-gray-100/5 to-gray-50 p-2 ring-1 ring-inset ring-gray-100/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                                <img src="{{ asset('images/screenshot-create-link.jpg') }}" alt="App screenshot"
                                    width="2432" height="1442" loading="lazy" 
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

            <div id="features" class="overflow-hidden bg-gray-50 py-24 sm:py-32 lg:py-52">
                <div class="mx-auto max-w-7xl md:px-6 lg:px-8 group">
                    <div class="grid grid-cols-1 gap-y-16 gap-x-8 sm:gap-y-20 lg:grid-cols-2 lg:items-start">
                        <div class="px-6 lg:px-0 lg:pt-4 lg:pr-4">
                            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-lg">
                                <h2 class="text-base font-semibold leading-7 text-blue-600">Features</h2>
                                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">A better workflow</p>
                                <p class="mt-6 text-lg leading-8 text-gray-600">Don't lose track of your tracking. 100% visibility across all of your domain links, allowing filtering for campaigns, sources and mediums.</p>
                                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                                    <div class="relative pl-9">
                                        <dt class="inline font-semibold text-gray-900">
                                            <svg class="absolute top-1 left-1 h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z" clip-rule="evenodd" />
                                            </svg>  
                                            Link health check
                                        </dt>
                                        <dd class="inline">The health of all of your links are checked daily and their status is displayed in your dashboard &ndash; so dead links are a thing of the past!</dd>
                                    </div>
                        
                                    <div class="relative pl-9">
                                        <dt class="inline font-semibold text-gray-900">
                                            <svg class="absolute top-1 left-1 h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M11.983 1.907a.75.75 0 00-1.292-.657l-8.5 9.5A.75.75 0 002.75 12h6.572l-1.305 6.093a.75.75 0 001.292.657l8.5-9.5A.75.75 0 0017.25 8h-6.572l1.305-6.093z" />
                                            </svg>
                                            
                                            Link wizard
                                        </dt>
                                        <dd class="inline">Create your links using our wizard to set sensible defaults. Excellent for simple data consistency.</dd>
                                    </div>
                        
                                    <div class="relative pl-9">
                                        <dt class="inline font-semibold text-gray-900">
                                            <svg class="absolute top-1 left-1 h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.606 12.97a.75.75 0 01-.134 1.051 2.494 2.494 0 00-.93 2.437 2.494 2.494 0 002.437-.93.75.75 0 111.186.918 3.995 3.995 0 01-4.482 1.332.75.75 0 01-.461-.461 3.994 3.994 0 011.332-4.482.75.75 0 011.052.134z" clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M5.752 12A13.07 13.07 0 008 14.248v4.002c0 .414.336.75.75.75a5 5 0 004.797-6.414 12.984 12.984 0 005.45-10.848.75.75 0 00-.735-.735 12.984 12.984 0 00-10.849 5.45A5 5 0 001 11.25c.001.414.337.75.751.75h4.002zM13 9a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                            </svg>
                                            Bulk import
                                        </dt>
                                        <dd class="inline">Mass import your links quickly using our bulk link importer. Set import presets for your source, campaign and medium, then customise each link with ease.</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div class="sm:px-6 lg:px-0">
                            <div class="relative isolate overflow-hidden bg-blue-500 px-6 pt-8 sm:mx-auto sm:max-w-2xl sm:rounded-3xl sm:pt-16 sm:pl-16 sm:pr-0 lg:mx-0 lg:max-w-none">
                            <div class="group-hover:-translate-x-40 transition ease-in-out absolute duration-1000 -inset-y-px -left-3 -z-10 w-full origin-bottom-left skew-x-[-30deg] bg-blue-100 opacity-20 ring-1 ring-inset ring-white" aria-hidden="true"></div>
                            <div class="mx-auto max-w-2xl sm:mx-0 sm:max-w-none">
                                <img src="{{ asset('images/screenshot-links.jpg') }}" alt="Product screenshot" width="1216" height="721" class="-mb-12 w-[57rem] max-w-none rounded-tl-xl bg-gray-800 ring-1 ring-white/10 group-hover:-translate-x-5 group-hover:-translate-y-5 transition duration-1000 ease-in-out">
                            </div>
                            <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10 sm:rounded-3xl" aria-hidden="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="overflow-hidden bg-gray-50 pb-24 sm:pb-32 lg:pb-52">
                <div class="mx-auto max-w-7xl md:px-6 lg:px-8 group">
                    <div class="grid grid-cols-1 gap-y-16 gap-x-8 sm:gap-y-20 lg:grid-cols-2 lg:items-start">
                        <div class="sm:px-6 lg:px-0">

                            <!-- -->

                            <div class="sm:px-6 lg:px-0">

                                <div data-aos="fade-down-right" data-aos-delay="600" data-aos-duration="1000" class="bg-white shadow rounded-lg max-w-[320px] mx-auto mt-8">
                                    <div class="px-4 py-5 sm:p-6">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900">
                                            DNS Status: go2.mydomain.com
                                        </h3>
                                        <div class="mt-2 max-w-xl text-sm text-gray-500 flex gap-5 py-4">
                                            <p>Hooray! Your DNS is verified and your shortlink domain is active!</p>
                                            <svg class="shrink-0 inline-block w-16 h-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"></path>
                                            </svg>
                                        </div>
                                    </div>    
                                </div>
                                <div data-aos="fade-up-right" data-aos-delay="1200" data-aos-duration="1000" class="bg-white shadow rounded-lg max-w-[500px] mt-8 mx-5 sm:mx-auto ">
                                    <div class="px-4 py-5 sm:p-6 text-center">
                                        <h3 class="text-2xl font-semibold leading-6 text-gray-900">🎉 Link created!</h3>
                                        <div class="mt-6 mx-auto max-w-lg text-base text-gray-600">
                                            <p>Your trackable link has been created! Click the text box below to copy it to your clipboard.</p>
                                        </div>
        
                                        <div class="my-6 mx-auto w-full lg:w-[90%] transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-gray-50 shadow-lg ring-1 ring-black ring-opacity-5 transition-all">
                                            <div class="relative">
                                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z"></path>
                                                </svg>    
                                                <input @click.prevent="$el.focus(); $el.select(); window.navigator.clipboard.writeText('https://go2.mydomain.com/NTTjimBM');" type="text" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 text-center" value="https://go2.mydomain.com/NTTjimBM">
                                            </div>
                                        </div>
        
                                        <div class="mt-5 flex justify-center items-center gap-5">

                                            <button @click.prevent=""" type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition ease-in-out duration-300">
                                                Create another
                                            </button>

                                            <button @click.prevent="" type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition ease-in-out duration-300">
                                                Continue
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="px-6 lg:px-0 lg:pt-4 lg:pr-4">
                            <div class="mx-auto max-w-2xl lg:ml-auto lg:max-w-lg">
                                <h2 class="text-base font-semibold leading-7 text-blue-600">Features</h2>
                                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Custom shortlink domains</p>
                                <p class="mt-6 text-lg leading-8 text-gray-600">Give peace of mind to your users. Use your own domains for tracking link short URLs.</p>
                                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                                    <div class="relative pl-9">
                                        <dt class="inline font-semibold text-gray-900">
                                            <svg class="absolute top-1 left-1 h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M11.983 1.907a.75.75 0 00-1.292-.657l-8.5 9.5A.75.75 0 002.75 12h6.572l-1.305 6.093a.75.75 0 001.292.657l8.5-9.5A.75.75 0 0017.25 8h-6.572l1.305-6.093z" />
                                            </svg>

                                            Lightening quick setup
                                        </dt>
                                        <dd class="inline">Using Cloudflare's robust platform, we can get your custom domains up and running quick-smart.</dd>
                                    </div>
                        
                                    <div class="relative pl-9">
                                        <dt class="inline font-semibold text-gray-900">

                                            <svg class="absolute top-1 left-1 h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4.606 12.97a.75.75 0 01-.134 1.051 2.494 2.494 0 00-.93 2.437 2.494 2.494 0 002.437-.93.75.75 0 111.186.918 3.995 3.995 0 01-4.482 1.332.75.75 0 01-.461-.461 3.994 3.994 0 011.332-4.482.75.75 0 011.052.134z" clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M5.752 12A13.07 13.07 0 008 14.248v4.002c0 .414.336.75.75.75a5 5 0 004.797-6.414 12.984 12.984 0 005.45-10.848.75.75 0 00-.735-.735 12.984 12.984 0 00-10.849 5.45A5 5 0 001 11.25c.001.414.337.75.751.75h4.002zM13 9a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            Super fast redirects
                                        </dt>
                                        <dd class="inline">Our redirects are delivered from the edge, meaning super fast transportation for your users to their destination.</dd>
                                    </div>
                        
                                    <div class="relative pl-9">
                                        <dt class="inline font-semibold text-gray-900">
                                            <svg class="absolute top-1 left-1 h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M16.555 5.412a8.028 8.028 0 00-3.503-2.81 14.899 14.899 0 011.663 4.472 8.547 8.547 0 001.84-1.662zM13.326 7.825a13.43 13.43 0 00-2.413-5.773 8.087 8.087 0 00-1.826 0 13.43 13.43 0 00-2.413 5.773A8.473 8.473 0 0010 8.5c1.18 0 2.304-.24 3.326-.675zM6.514 9.376A9.98 9.98 0 0010 10c1.226 0 2.4-.22 3.486-.624a13.54 13.54 0 01-.351 3.759A13.54 13.54 0 0110 13.5c-1.079 0-2.128-.127-3.134-.366a13.538 13.538 0 01-.352-3.758zM5.285 7.074a14.9 14.9 0 011.663-4.471 8.028 8.028 0 00-3.503 2.81c.529.638 1.149 1.199 1.84 1.66zM17.334 6.798a7.973 7.973 0 01.614 4.115 13.47 13.47 0 01-3.178 1.72 15.093 15.093 0 00.174-3.939 10.043 10.043 0 002.39-1.896zM2.666 6.798a10.042 10.042 0 002.39 1.896 15.196 15.196 0 00.174 3.94 13.472 13.472 0 01-3.178-1.72 7.973 7.973 0 01.615-4.115zM10 15c.898 0 1.778-.079 2.633-.23a13.473 13.473 0 01-1.72 3.178 8.099 8.099 0 01-1.826 0 13.47 13.47 0 01-1.72-3.178c.855.151 1.735.23 2.633.23zM14.357 14.357a14.912 14.912 0 01-1.305 3.04 8.027 8.027 0 004.345-4.345c-.953.542-1.971.981-3.04 1.305zM6.948 17.397a8.027 8.027 0 01-4.345-4.345c.953.542 1.971.981 3.04 1.305a14.912 14.912 0 001.305 3.04z" />
                                            </svg>
                                            Safe &amp; secure
                                        </dt>
                                        <dd class="inline">Yeah we know, we shouldn't really be bragging &ndash; it's not 1999. But rest-assured, we provision TLS on the domains you use for your shortlinks.</dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class=" bg-gray-50 pb-24 sm:pb-32 lg:pb-52">

                <div class="mx-auto max-w-7xl md:px-6 lg:px-8 group">
                    <div class="grid grid-cols-1 gap-y-16 gap-x-8 sm:gap-y-20 lg:grid-cols-2 lg:items-start">
                        <div class="px-6 lg:px-0 lg:pt-4 lg:pr-4">
                            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-lg">
                                <h2 class="text-base font-semibold leading-7 text-blue-600">Features</h2>
                                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Automatic QR codes</p>
                                <p class="mt-6 text-lg leading-8 text-gray-600">Want to track traditional offline campaigns? We've got you covered&hellip;</p>
                                <p class="mt-6 text-lg leading-8 text-gray-600">Preview and download high-res QR codes for any of your links at the touch of a button for use in your offline campaigns. </p>
                            </div>
                        </div>
                        <div class="sm:px-6 lg:px-0">
                            <div class="mx-auto w-[300px] sm:w-[320px] md:w-[500px] md:-translate-y-10 aspect-square relative sm:mx-0 sm:max-w-none">
                                <img src="{{ asset('images/qr-code.png') }}" alt="Product screenshot" width="500" height="500" 
                                class="md:w-full rounded-3xl bg-gray-800 ring-1 ring-white/10 transition ease-in-out duration-1000 group-hover:rotate-6 z-10 relative shadow-lg">
                                <div class="absolute w-full aspect-square bg-blue-500 rounded-3xl transition ease-in-out duration-700 group-hover:-translate-x-8 group-hover:-translate-y-8 shadow-lg z-0 top-0"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Testimonial section -->
            <!--div class="mx-auto mt-32 max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="relative overflow-hidden bg-gray-900 py-20 px-6 shadow-xl sm:rounded-3xl sm:py-24 sm:px-10 md:px-12 lg:px-20">
                    <img class="absolute inset-0 h-full w-full object-cover brightness-150 saturate-0"
                        src="https://d347cldnsmtg5x.cloudfront.net/pic_5274_2_5f52448a26a08.jpg"
                        alt="">
                    <div class="absolute inset-0 bg-gray-900/90 mix-blend-multiply"></div>
                    <svg viewBox="0 0 1097 845" aria-hidden="true"
                        class="absolute -top-56 -left-80 w-[68.5625rem] transform-gpu blur-3xl">
                        <path fill="url(#68eb76c4-2bc9-4928-860e-70adf05719f4)" fill-opacity=".45"
                            d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                        <defs>
                            <linearGradient id="68eb76c4-2bc9-4928-860e-70adf05719f4" x1="1097.04" x2="-141.165"
                                y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#60a5fa" />
                                <stop offset="1" stop-color="#3b82f6" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <svg viewBox="0 0 1097 845" aria-hidden="true"
                        class="hidden md:absolute md:bottom-16 md:left-[50rem] md:block md:w-[68.5625rem] md:transform-gpu md:blur-3xl">
                        <path fill="url(#68eb76c4-2bc9-4928-860e-70adf05719f4)" fill-opacity=".25"
                            d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                    </svg>
                    <div class="relative mx-auto max-w-2xl lg:mx-0">
                        <img class="h-12 w-auto" src="https://www.aplaceforeverything.co.uk/assets/svg/logo-aplaceforeverything.svg"
                            alt="" style="    filter: brightness(0) invert(1);">
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
            </div-->

            <!-- Pricing section -->

            <x-section-pricing :plans="$plans"/>
              

            <!-- Reviews -->
            <section id="reviews" aria-labelledby="reviews-title" class="py-24 bg-gray-50">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-4xl text-center">
                        <h2 class="text-base font-semibold leading-7 text-blue-600">Reviews</h2>
                        <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Our customers love
                            it</p>
                    </div>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="title">Look no further.</x-slot>
                                <x-slot name="content">I've been using UTMwise for a while now to track the performance of my affiliate links and online marketing campaigns, and I couldn't be happier with the results. The platform is user-friendly and easy to use, and the support team is always available to answer my questions.</x-slot>
                                <x-slot name="author">MB, developer</x-slot>
                            </x-review-card>
                            <x-review-card>
                                <x-slot name="stars">
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                    <x-star />
                                </x-slot>
                                <x-slot name="title">Game changer.</x-slot>
                                <x-slot name="content">As someone who has struggled to keep track of tracking links in the past, UTM Wise has been a game-changer.</x-slot>
                                <x-slot name="author">Ilias, CiG Design</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
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
                                <x-slot name="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus arcu eget posuere posuere!</x-slot>
                                <x-slot name="author">SomePerson</x-slot>
                            </x-review-card>
                        </div>
                        <div class="pointer-events-none absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-50">
                        </div>
                        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-gray-50">
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
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">How long does the free trial last and will I be billed automatically?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">The free trial lasts 7 days and no payment will be taken automatically. We don't take any payment details from you when starting your trial. At the end of, or during your free trial period, you can upgrade to a full plan from within your dashboard and your subscription will start.</p>
                        </dd>
                    </div>
                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">Are there any free trial restrictions?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">During your trial you will be prevented from creating custom shortlink domains, and will be limited to creating 25 links.</p>
                        </dd>
                    </div>
                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">What happens when my free trial ends?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">At the end of your free trial, your account will effectively be "paused" &ndash; preventing access to resources until you choose a paid plan. Once you're subscribed to a pay plan, your account will resume right where you left off (but with more resources!)</p>
                        </dd>
                    </div>
                    <div class="pt-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <dt class="text-base font-semibold leading-7 text-gray-900 lg:col-span-5">Can I upgrade my plan?</dt>
                        <dd class="mt-4 lg:col-span-7 lg:mt-0">
                            <p class="text-base leading-7 text-gray-600">Absolutely! You can switch to higher usage plans from your billing dashboard. Or, alternatively, you can add extra resources such as domains and seats to your account on-the-fly as an extra monthly subscription. Extra domains are priced at £5/m, and additional seats are priced at £2/m. These are billed monthly, regardless of the billing cycle on your plan.</p>
                        </dd>
                    </div>

                    <!-- More questions... -->
                </dl>
            </div>


        </main>

        <x-marketing.footer />

    </div>


</body>

</html>
