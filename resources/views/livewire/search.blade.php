<form class="flex w-full py-3 lg:ml-0 mx-auto" action="#" method="GET" x-data="SearchDomains()">

    <div class="relative text-gray-400 focus-within:text-gray-600 w-1/3 mx-auto max-w-xl">

        <input id="search-field" wire:model="term" 
        @keydown.ctrl.k.window.prevent="focusSearch()" 
        @keydown.cmd.k.window.prevent="focusSearch()"
        class="text-gray-900 w-full border-0 px-4 py-2.5 rounded-xl bg-gray-50/50 p-2 ring-1 ring-black ring-opacity-5 transition-all sm:text-sm" placeholder="Search..." type="search" name="term">

        @if($term !== "")

            @if(!$domains->isEmpty())
                <ul class="-mb-2 max-h-72 scroll-py-2 overflow-y-auto py-2 text-sm bg-white text-gray-800" id="options" role="listbox">
                    @foreach($domains as $domain)
                        <li class="cursor-default select-none rounded-md px-4 py-2 hover:bg-blue-600 hover:text-white" role="option" tabindex="-1">
                            <a class="block w-full" href="{{ route('domain.links', $domain) }}">{{ $domain->domain }}</a>
                        </li>
                    @endforeach
                </ul>
            @else 
                <div class="-mb-2 max-h-72 scroll-py-2 overflow-y-auto py-2 text-sm bg-white text-gray-800">
                    <p class="cursor-default select-none rounded-md px-4 py-2">No domains found.</p>
                </div>
            @endif

        @endif


    </div>
</form>
<script>
    window.SearchDomains = () => {
        return {
            focusSearch() {
                return this.$el.focus();
            }
        }
    };
</script>