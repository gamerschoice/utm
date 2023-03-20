
<div x-show="open" class="relative z-40 lg:hidden" aria-modal="true">
    <div 
        x-show="open" 
        x-transition:enter="transition-opacity ease-linear duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="transition-opacity ease-linear duration-300" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0" 
        class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
    <div class="fixed inset-0 z-40 flex">
        <div 
            x-show="open" 
            x-transition:enter="transition ease-in-out duration-300 transform" 
            x-transition:enter-start="-translate-x-full" 
            x-transition:enter-end="translate-x-0" 
            x-transition:leave="transition ease-in-out duration-300 transform" 
            x-transition:leave-start="translate-x-0" 
            x-transition:leave-end="-translate-x-full" 
            class="relative flex w-full max-w-xs flex-1 flex-col bg-white pt-5 pb-4" 
            @click.away="open = false">

            <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0 right-0 -mr-12 pt-2" style="display: none;">
                <button @click="open = false" type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-shrink-0 items-center px-4">
                <a href="{{ route('dashboard') }}">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
            </div>

            <div class="mt-5 h-0 flex-1 overflow-y-auto">
                <nav class="space-y-1 px-2">
                    <a x-data="{ active: '{{ request()->routeIs('dashboard') }}' }" href="{{ route('dashboard') }}" 
                        :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-50 hover:text-gray-900' : !active }"
                        class="group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                        <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                        </svg>
                        {{ __('Dashboard') }}
                    </a>
                    <div x-data="{ active: '{{ request()->routeIs('domain.*') }}' }"  
                        :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-100 hover:text-gray-900' : !active }"
                        class="group block rounded-md px-2 py-2 text-sm font-medium">
                        <a href="{{ route('domain.index') }}" class="flex items-center">
                            <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                            </svg>
                            <span class="flex-1">{{ __('Domains') }}</span>
                            <span class="bg-blue-200  ml-3 inline-block rounded-full py-0.5 px-3 text-xs font-medium">3</span>
                        </a>
                        <div class="transition group-hover:bg-white bg-gray-100 mt-3 rounded-md px-3 py-2">
                            <ul class="list-none divide-y">
                                <li class="hover:translate-x-1 transition text-sm font-light py-2 px-2"><a href="#">ethptc.com</a></li>
                                <li class="hover:translate-x-1 transition text-sm font-light py-2 px-2"><a href="#">thecasinobets.com</a></li>
                                <li class="hover:translate-x-1 transition text-sm font-light py-2 px-2"><a href="#">gamerschoice.gg</a></li>
                                <li class="text-sm font-light py-2"><a href="#" class="inline-block px-2 py-1 bg-blue-200 text-xs rounded-md">view all domains</a></li>
                            </ul>
                        </div>
                    </div>
        
                    <a x-data="{ active: '{{ request()->routeIs('billing') }}' }" href="{{ route('billing') }}"
                        :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-50 hover:text-gray-900' : !active }"
                        class="group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                        <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                        {{ __('Billing') }}
                    </a>
        
                    <a x-data="{ active: '{{ request()->routeIs('profile.*') }}' }" href="{{ route('profile.show') }}"
                        :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-50 hover:text-gray-900' : !active }"
                        class="group flex items-center rounded-md px-2 py-2 text-sm font-medium">
        
                        <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                          </svg>
                          
                        {{ __('Profile') }}
                    </a>
        
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <a x-data="{ active: '{{ request()->routeIs('teams.*') }}' }" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-50 hover:text-gray-900' : !active }"
                            class="group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                            <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                            {{ __('Team') }}
                        </a>
                    @endif
                </nav>
            </div>
        </div>
        <div class="w-14 flex-shrink-0" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>


<div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">

    <div class="flex flex-grow flex-col overflow-y-auto border-r border-gray-200 bg-white pt-5">

        <div class="flex flex-shrink-0 items-end px-4 pb-4 border-b border-primary-800">
            <a href="{{ route('dashboard') }}">
                <x-application-mark class="block h-9 w-auto" />
            </a>
        </div>
        <nav class="mt-5 flex-1 space-y-1 px-2">
    
            <a x-data="{ active: '{{ request()->routeIs('dashboard') }}' }" href="{{ route('dashboard') }}" 
                :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-50 hover:text-gray-900' : !active }"
                class="group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                </svg>
                {{ __('Dashboard') }}
            </a>
            <div x-data="{ active: '{{ request()->routeIs('domain.*') }}' }"  
                :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-100 hover:text-gray-900' : !active }"
                class="group block rounded-md px-2 py-2 text-sm font-medium">
                <a href="{{ route('domain.index') }}" class="flex items-center">
                    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                    </svg>
                    <span class="flex-1">{{ __('Domains') }}</span>
                    <span class="bg-blue-200  ml-3 inline-block rounded-full py-0.5 px-3 text-xs font-medium">3</span>
                </a>
                <div class="transition group-hover:bg-white bg-gray-100 mt-3 rounded-md px-3 py-2">
                    <ul class="list-none divide-y">
                        <li class="hover:translate-x-1 transition text-sm font-light py-2 px-2"><a href="#">ethptc.com</a></li>
                        <li class="hover:translate-x-1 transition text-sm font-light py-2 px-2"><a href="#">thecasinobets.com</a></li>
                        <li class="hover:translate-x-1 transition text-sm font-light py-2 px-2"><a href="#">gamerschoice.gg</a></li>
                        <li class="text-sm font-light py-2"><a href="#" class="inline-block px-2 py-1 bg-blue-200 text-xs rounded-md">view all domains</a></li>
                    </ul>
                </div>
            </div>

            <a x-data="{ active: '{{ request()->routeIs('billing') }}' }" href="{{ route('billing') }}"
                :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-50 hover:text-gray-900' : !active }"
                class="group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>
                {{ __('Billing') }}
            </a>

            <a x-data="{ active: '{{ request()->routeIs('profile.*') }}' }" href="{{ route('profile.show') }}"
                :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-50 hover:text-gray-900' : !active }"
                class="group flex items-center rounded-md px-2 py-2 text-sm font-medium">

                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                  </svg>
                  
                {{ __('Profile') }}
            </a>

            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
            <a x-data="{ active: '{{ request()->routeIs('teams.*') }}' }" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                :class="{ 'bg-gray-100 text-gray-900' : active, ' text-gray-600 hover:bg-gray-50 hover:text-gray-900' : !active }"
                class="group flex items-center rounded-md px-2 py-2 text-sm font-medium">
                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
                {{ __('Team') }}
            </a>
            @endif

        </nav>

    </div>
    
</div>

<div class="flex flex-1 flex-col lg:pl-64">
    <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
        <button @click="open = true" type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 lg:hidden">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
        </button>
        <div class="flex flex-1 justify-between px-4">
            <div class="flex flex-1">
                <x-search />
            </div>

            <div class="ml-4 flex items-center lg:ml-6">
            
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

            </div>
        </div>
    </div>

</div>
