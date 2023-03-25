<figure class="animate-fade-in rounded-3xl bg-white p-6 opacity-0 shadow-md shadow-gray-900/5" aria-hidden="false" style="animation-delay: 0s;">
    <blockquote class="text-gray-900">
        <div class="flex">
            {!! $stars !!}
        </div>
        <p class="mt-4 text-lg font-semibold leading-6 before:content-['“'] after:content-['”']">
            {!! $title !!}
        </p>
        <p class="mt-3 text-base leading-7">
            {!! $content !!}
        </p>
    </blockquote>
    <figcaption class="mt-3 text-sm text-gray-600 before:content-['–_']">{!! $author !!}</figcaption>
</figure>