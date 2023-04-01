<x-static-layout>
    <x-slot name="meta">
        <title>Blog | UTM Wise</title> 
    </x-slot>

    <x-slot name="masthead">
        <h1 class="text-4xl font-black font-sans tracking-tight text-transparent sm:text-5xl xl:text-6xl text-white pb-8">
            Blog
        </h1>
    </x-slot>

    <div class="mx-auto mt-0 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3 -translate-y-[160px]">

        @foreach($posts as $post)
            
            <x-marketing.blog-card :post="$post" />
            
        @endforeach

    </div>

</x-static-layout>