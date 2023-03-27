<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased js-focus-visible scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTM Wise</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
        <!--link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"-->
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
    <meta property="og:type" content="article">
    <meta property="og:title" content="Get UTM Wise and take control of your link tracking">
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

            </nav>
        </header>

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
                                <a href="#" rel="nofollow"
                                    class="inline-flex items-center rounded-md bg-white px-4 py-2 text-base font-semibold text-gray-900 shadow-sm  hover:bg-gray-50 transition ease-in-out duration-300 hover:scale-105">Coming soon</a>
                            </div>
                        </div>
                        <div class="mt-16 flow-root sm:mt-24">
                            <div 
                                data-aos="zoom-in-up" data-aos-delay="1200" data-aos-duration="1200"
                                class="-m-2 rounded-xl bg-gradient-to-b from-gray-100/5 to-gray-50 p-2 ring-1 ring-inset ring-gray-100/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                                <img src="{{ asset('images/screenshot-create-link.jpg') }}" alt="App screenshot"
                                    width="2432" height="1442"
                                    class="rounded-md shadow-2xl ring-1 ring-gray-100/10">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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
                                            <path d="M16.555 5.412a8.028 8.028 0 00-3.503-2.81 14.899 14.899 0 011.663 4.472 8.547 8.547 0 001.84-1.662zM13.326 7.825a13.43 13.43 0 00-2.413-5.773 8.087 8.087 0 00-1.826 0 13.43 13.43 0 00-2.413 5.773A8.473 8.473 0 0010 8.5c1.18 0 2.304-.24 3.326-.675zM6.514 9.376A9.98 9.98 0 0010 10c1.226 0 2.4-.22 3.486-.624a13.54 13.54 0 01-.351 3.759A13.54 13.54 0 0110 13.5c-1.079 0-2.128-.127-3.134-.366a13.538 13.538 0 01-.352-3.758zM5.285 7.074a14.9 14.9 0 011.663-4.471 8.028 8.028 0 00-3.503 2.81c.529.638 1.149 1.199 1.84 1.66zM17.334 6.798a7.973 7.973 0 01.614 4.115 13.47 13.47 0 01-3.178 1.72 15.093 15.093 0 00.174-3.939 10.043 10.043 0 002.39-1.896zM2.666 6.798a10.042 10.042 0 002.39 1.896 15.196 15.196 0 00.174 3.94 13.472 13.472 0 01-3.178-1.72 7.973 7.973 0 01.615-4.115zM10 15c.898 0 1.778-.079 2.633-.23a13.473 13.473 0 01-1.72 3.178 8.099 8.099 0 01-1.826 0 13.47 13.47 0 01-1.72-3.178c.855.151 1.735.23 2.633.23zM14.357 14.357a14.912 14.912 0 01-1.305 3.04 8.027 8.027 0 004.345-4.345c-.953.542-1.971.981-3.04 1.305zM6.948 17.397a8.027 8.027 0 01-4.345-4.345c.953.542 1.971.981 3.04 1.305a14.912 14.912 0 001.305 3.04z" />
                                        </svg>
                                        Custom domain shortlinks.
                                    </dt>
                                    <dd class="inline">With a quick DNS update, you can use whatever domain, or subdomain you want for your shortlinks. E.g. go.mydomain.com, mydmn.co</dd>
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
                                <div data-aos="fade-up-right" data-aos-delay="1800" data-aos-duration="1000" class="bg-white shadow rounded-lg max-w-[500px] mt-8 mx-5 sm:mx-auto ">
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
                                        <dd class="inline">Using CloudFlare's robust platform, we can get your custom domains up and running quick-smart.</dd>
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
                  

        </main>


    </div>


</body>

</html>
