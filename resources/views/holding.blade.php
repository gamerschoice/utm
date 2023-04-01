<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased js-focus-visible scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTM Wise</title>
    <link rel="icon" href="{{ asset('favicon.jpg') }}">
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
    <meta name="twitter:description" content="Say goodbye to spreadsheets! UTM Wise lets you manage your site's UTM tracking links like a pro.">
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

            </nav>
        </header>

        <main class="isolate">

            <x-marketing.hero :holding="true" />

            <!-- Feature section -->

            <x-marketing.features />


            <x-section-pricing :plans="$plans" :holding="true" />

            <x-marketing.faqs />
                  

        </main>

        <x-marketing.footer />


    </div>


</body>

</html>
