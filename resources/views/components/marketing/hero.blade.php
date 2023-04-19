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
                
                    <a href="{{ route('register') }}" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-base font-semibold text-gray-900 shadow-sm  hover:bg-gray-50 transition ease-in-out duration-300 hover:scale-105">Get started for free</a>
                
                </div>
            </div>
            <div class="mt-16 flex items-center sm:mt-24 relative" x-data="AppScreenshots()" x-intersect="navigation = true">

                <div x-show="navigation" x-transition>
                    <div x-on:click.throttle="prev()" class="text-white bg-blue-500 rounded-full p-2 cursor-pointer absolute lg:hover:scale-125 hover:bg-white hover:text-blue-500 transition duration-300 left-0 z-10 lg:-left-[80px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>                   
                    </div>   
                </div>

                <div data-aos="zoom-in-up" data-aos-delay="1200" data-aos-duration="1200" 
                    class="-m-2 select-none rounded-xl bg-gradient-to-b from-gray-100/5 to-gray-50 p-2 ring-1 ring-inset ring-gray-100/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                    <img id="screenshot-image" x-bind:src="screenshots[active].src" x-bind:alt="screenshots[active].alt"
                        width="1216" height="669" loading="lazy" 
                        class="transition duration-150 rounded-md shadow-2xl ring-1 ring-gray-100/10" draggable="false">
                </div>

                <div x-show="navigation" x-transition>
                    <div x-on:click.throttle="next()" class="text-white bg-blue-500 rounded-full p-2 cursor-pointer absolute lg:hover:scale-125 hover:bg-white hover:text-blue-500 transition duration-300 right-0 z-10 lg:-right-[80px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>                                      
                    </div>   
                </div>

            </div>
        </div>
    </div>

</div>


<script>
    window.AppScreenshots = () => {
        return {
            elem: null,
            navigation: false,
            active: 0,
            prev() {
                console.log('prev');
                if(this.active === 0)
                    return this.swapScreenshot(this.screenshots.length - 1);

                this.swapScreenshot(this.active - 1);
            },
            next() {
                if(this.active === this.screenshots.length - 1)
                    return this.swapScreenshot(0);

                this.swapScreenshot(this.active + 1);
            },
            swapScreenshot(index) {
                this.active = index;
            },
            init() {
                this.elem = document.getElementById('screenshot-image');
                this.active = this.initialScreenshot();
            },
            initialScreenshot() {
                return this.screenshots.findIndex(item => item.initial);
            },
            screenshots: [
                { src: '{{ asset("images/screenshots/screenshot-linkwizard-1.webp") }}', initial: true, alt: 'UTM Wise Link Wizard Screenshot 1' },
                { src: '{{ asset("images/screenshots/screenshot-linkwizard-2.webp") }}', alt: 'UTM Wise Link Wizard Screenshot 2' },
                { src: '{{ asset("images/screenshots/screenshot-linkwizard-3.webp") }}', alt: 'UTM Wise Link Wizard Screenshot 3' },
                { src: '{{ asset("images/screenshots/screenshot-linkwizard-4.webp") }}', alt: 'UTM Wise Link Wizard Screenshot 4' },
                { src: '{{ asset("images/screenshots/screenshot-linkwizard-5.webp") }}', alt: 'UTM Wise Link Wizard Screenshot 5' },
                { src: '{{ asset("images/screenshots/screenshot-links-1.webp") }}', alt: 'UTM Wise Links Screenshot 1' },
            ]    

        }
    };

</script>