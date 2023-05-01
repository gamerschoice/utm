<!-- Header -->
<header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1 relative z-10">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
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
            <a href="/#features" class="font-semibold leading-6 text-white hover:bg-gray-100/5 rounded-md py-1 px-3 transition-colors ease-in-out">Features</a>

            <a href="/#pricing" class="font-semibold leading-6 text-white hover:bg-gray-100/5 rounded-md py-1 px-3 transition-colors ease-in-out">Pricing</a>

            <!--a href="/#reviews" class="font-semibold leading-6 text-white hover:bg-gray-100/5 rounded-md py-1 px-3 transition-colors ease-in-out">Reviews</a-->

            <a href="/#faqs" class="font-semibold leading-6 text-white hover:bg-gray-100/5 rounded-md py-1 px-3 transition-colors ease-in-out">FAQs</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="{{ route('login') }}" class="font-semibold leading-6 text-white hover:bg-white/10 rounded-md py-1 px-3 transition-colors ease-in-out">Log in <span
                    aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="flex items-center gap-6">
            <div class="lg:hidden">
                <button @click="burgerOpen = !burgerOpen" class="relative z-10 -m-2 inline-flex items-center rounded-lg stroke-white p-2 bg-white/10 [&amp;:not(:focus-visible)]:focus:outline-none" aria-label="Toggle site navigation" type="button" aria-expanded="false">
                    <svg x-show="!burgerOpen" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6"><path d="M5 6h14M5 18h14M5 12h14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <svg x-show="burgerOpen" x-cloak="" viewBox="0 0 24 24" fill="none" aria-hidden="true" class="h-6 w-6"><path d="M17 14l-5-5-5 5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </button>
                <div x-show="burgerOpen" x-cloak="" class="fixed inset-0 z-0 bg-gray-300/10 backdrop-blur"
                    x-transition:enter="transition-opacity ease-linear duration-300" 
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100" 
                    x-transition:leave="transition-opacity ease-linear duration-300" 
                    x-transition:leave-start="opacity-100" 
                    x-transition:leave-end="opacity-0" ></div>
                <div x-show="burgerOpen" x-cloak="" class="absolute inset-x-0 top-0 z-0 origin-top rounded-b-2xl bg-gray-900 px-6 pb-6 pt-28 shadow-2xl shadow-gray-900/20" 
                    x-transition:enter="transition ease-linear duration-300" 
                    x-transition:enter-start="opacity-0 -translate-y-10" 
                    x-transition:enter-end="opacity-100 translate-y-0" 
                    x-transition:leave="transition ease-linear duration-300" 
                    x-transition:leave-start="opacity-100 translate-y-0" 
                    x-transition:leave-end="opacity-0 -translate-y-10">
                    <div class="space-y-4">
                        <a class="block text-base leading-7 tracking-tight text-white" href="/#features">Features</a>
                        <a class="block text-base leading-7 tracking-tight text-white" href="/#pricing">Pricing</a>
                        <!-- <a class="block text-base leading-7 tracking-tight text-white" href="/#reviews">Reviews</a> -->
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