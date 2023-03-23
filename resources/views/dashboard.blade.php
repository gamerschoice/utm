<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between border-b border-gray-300 py-6">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    ❤️ Welcome, {{ request()->user()->name }}
                </h1>
                <p class="text-lg pt-2 text-gray-500">Welcome to your dashboard. From here you can see a snapshot of your account data.</p>
            </div>
        </div>
    </x-slot>




<div class="flex flex-col py-8 lg:py-10 gap-y-10 lg:gap-y-14 ">

    <section class="flex flex-col gap-y-8 lg:gap-y-10">

        <div>
            <h3 class="text-xl font-semibold leading-6 text-gray-900">Your domains</h3>
            <p class="mt-2 text-lg text-gray-500">A selection of your recent domains.</p>
        </div>

        <div class="grid sm:grid-cols-3 gap-x-5 lg:gap-x-10">

            @foreach($domains as $domain)
                <x-domain-card :domain="$domain" />
            @endforeach
    
        </div>

    </section>

</div>

</x-app-layout>
