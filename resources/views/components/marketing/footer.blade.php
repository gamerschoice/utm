<!-- Footer -->
<div class="mx-auto mt-20 max-w-7xl px-6 lg:px-8">
    <footer aria-labelledby="footer-heading"
        class="relative border-t border-gray-900/10 py-8">
        <div class="flex flex-col sm:items-center sm:flex-row sm:justify-between gap-4">
            <x-application-mark />
            <ul role="list" class="flex gap-4">
                <!--li>
                    <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Blog</a>
                </li-->
                <li>
                    <a href="{{ route('terms') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Terms</a>
                </li>
                <li>
                    <a href="{{ route('privacy') }}" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Privacy</a>
                </li>
                <li>
                    <a href="https://utmwise.instatus.com/" target="_blank" rel="noopener nofollow" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Service status</a>
                <li>
                    <a href="mailto:support@utmwise.com" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Support</a>
                </li>
            </ul>
        </div>
    </footer>
</div>