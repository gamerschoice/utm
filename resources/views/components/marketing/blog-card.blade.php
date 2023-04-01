<div class="flex flex-col overflow-hidden rounded-lg shadow-lg hover:-translate-y-2 transition-transform">
    <div class="flex flex-1 flex-col justify-between bg-white p-6">
        <div class="flex-1">
          <p class="text-sm font-medium text-blue-500">Article</p>
          <a href="{{ route('blog.view', $post['slug']) }}" class="mt-2 block">
            <h2 class="text-xl font-semibold text-gray-900">{{ $post['title'] }}</h2>
            <p class="mt-3 text-base text-gray-500">{!! $post['excerpt'] !!}</p>
          </a>
        </div>
        <div class="mt-6 flex items-center">
          <div>
            <p class="text-sm font-medium text-gray-900">
              <a href="#" class="hover:underline">UTM Wise</a>
            </p>
            <div class="flex space-x-1 text-sm text-gray-500">
              <time datetime="{{ $post['date'] }}">{{ $post['date'] }}</time>
              <span aria-hidden="true">&middot;</span>
              <span>{{ rand(1,6) }} min read</span>
            </div>
          </div>
        </div>
    </div>
</div>