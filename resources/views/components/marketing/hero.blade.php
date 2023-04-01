@props([
    'holding' => false
])
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
                
                    @if(!$holding)
                        <a href="/register" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-base font-semibold text-gray-900 shadow-sm  hover:bg-gray-50 transition ease-in-out duration-300 hover:scale-105">Get started for free</a>
                    @else 
                        <a href="#" rel="nofollow" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-base font-semibold text-gray-900 shadow-sm  hover:bg-gray-50 transition ease-in-out duration-300 hover:scale-105">Coming soon</a>
                    @endif
                
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