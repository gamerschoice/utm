<x-app-layout>

    <div x-data="DomainView()">

        <x-slot name="header"></x-slot> <!-- remove from header slot so alpine tabs work -->

        <div class="border-b border-gray-300 pt-6">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    {{ $domain->domain }}
                </h1>
            </div>
            <div class="pt-6">
                <nav class="-mb-px flex space-x-8">
                    <a href="#" rel="nofollow" 
                        @click.prevent="activeTab = 'links'" 
                        :class="{ 'font-medium border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : activeTab !== 'links', 'font-semibold border-blue-500 text-blue-600' : activeTab === 'links'}"
                        class="whitespace-nowrap border-b-2 px-1 pb-4">Links</a>
                    <a href="#" rel="nofollow" 
                        @click.prevent="activeTab = 'details'" 
                        :class="{ 'font-medium border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : activeTab !== 'details', 'font-semibold border-blue-500 text-blue-600' : activeTab === 'details'}"
                        class="whitespace-nowrap border-b-2 px-1 pb-4">Details</a>
                    <a href="#" rel="nofollow" 
                        @click.prevent="activeTab = 'short-domain'" 
                        :class="{ 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' : activeTab !== 'short-domain', 'font-semibold border-blue-500 text-blue-600' : activeTab === 'short-domain'}"
                        class="whitespace-nowrap border-b-2 px-1 pb-4">Short Domain</a>

                </nav>
            </div>
        </div>

        <div x-show="activeTab === 'links'">
            @livewire('domains.view.links')
        </div>
        <div x-show="activeTab === 'details'" x-cloak>
            @livewire('domains.view.details')
        </div>
        <div x-show="activeTab === 'short-domain'" x-cloak>
            @livewire('domains.view.short-domain')
        </div>

    </div>


    <script>
        window.DomainView = () => {
            return {
                activeTab: 'links'
            }
        }
    </script>
</x-app-layout>
