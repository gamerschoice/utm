<div class="group relative p-6 transition ease-in-out bg-gradient-to-br from-gray-100/5 to-gray-900/10  ring-1 ring-inset ring-gray-100/10 rounded-xl">
    <div class="flex items-start gap-5">
        <div class="bg-white p-2 rounded-md">
            {!! $svg !!}
        </div>
        <div>
            <h5 class="text-white text-base font-semibold leading-7">{{ $title }}</h5>
            <div class="mt-2 text-sm leading-7 text-gray-300">{{ $content }}</div>
        </div>
    </div>
</div>