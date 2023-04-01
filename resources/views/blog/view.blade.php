<x-static-layout>
    <x-slot name="meta">
        <title>{{ $post['title'] }} | UTM Wise</title> 
    </x-slot>

    <x-slot name="masthead">
        <span class="inline-block text-sm px-3 py-1 mb-4 items-center border border-blue-300 bg-blue-900/10 rounded-full text-blue-50">{{ $post['date'] }}</span>
        <h1 class="text-4xl font-black font-sans tracking-tight text-transparent sm:text-5xl xl:text-6xl text-white pb-8">
            {{ $post['title'] }}
        </h1>
    </x-slot>

    <div class="prose mx-auto">
        {!! $post['body'] !!}
    </div>
</x-static-layout>