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

        <x-marketing.header :holding="false" />

        <main class="isolate">

            <x-marketing.hero :holding="false" />

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

            <x-marketing.features />

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
              

            <x-marketing.reviews />


            <x-marketing.faqs />


        </main>

        <x-marketing.footer />

    </div>


</body>

</html>
