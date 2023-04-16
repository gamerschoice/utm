
<div>

    <div class="flex lg:hidden fixed z-40 w-full mb-5 top-0 left-0 bg-white border-b border-gray-200 px-4 py-4 justify-between">
        
        <a href="{{ route('dashboard') }}">
            <x-application-mark-small class="block w-auto" />
        </a>

        <button @click="open = true" type="button" class=" border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
            <span class="sr-only">Open sidebar</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
        </button>
        
    </div>

    <div x-cloak="mob" :class="{ 'opacity-100 translate-x-0' : open, '-translate-x-full opacity-0' : !open }" class="h-screen transition duration-700 lg:translate-x-0 lg:opacity-100 fixed inset-y-0 flex w-64 flex-col z-50 shadow-lg lg:shadow-none">

        <div class="flex flex-grow flex-col overflow-y-auto bg-blue-600">

            <div class="flex flex-shrink-0 p-4 items-center justify-between">
                <a href="{{ route('dashboard') }}">
                    <x-application-mark-dark class="block h-9 w-auto" />
                </a>
                <svg @click="open = false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:hidden text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                  
            </div>
            <nav class="mt-5 flex-1 space-y-1 px-2 text-blue-200">
        
                <a x-data="{ active: '{{ request()->routeIs('dashboard') }}' }" href="{{ route('dashboard') }}" 
                    :class="{ 'bg-blue-700 text-white' : active, ' text-blue-200 hover:bg-blue-700 hover:text-white' : !active }"
                    class="transition-colors ease-in-out group flex items-center rounded-md px-2 py-2 text-sm font-semibold">
                    <svg class="transition-colors ease-in-out text-current mr-4 h-6 w-6 flex-shrink-0 text-blue-200 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                    </svg>
                    {{ __('Dashboard') }}
                </a>
                <div x-data="{ active: '{{ request()->routeIs('domain.*') }}' }"  
                    :class="{ 'bg-blue-700 text-white' : active, ' text-blue-200 hover:bg-blue-700 hover:text-white' : !active }"
                    class="transition-colors ease-in-out group block rounded-md px-2 py-2 text-sm font-semibold">
                    <a href="{{ route('domain.index') }}" class="flex items-center">
                        <svg class="transition-colors ease-in-out text-current mr-4 h-6 w-6 flex-shrink-0 text-blue-200 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                        <span class="flex-1">{{ __('Domains') }}</span>
                    </a>
                </div>

                <a x-data="{ active: '{{ request()->routeIs('billing') }}' }" href="{{ route('billing') }}"
                    :class="{ 'bg-blue-700 text-white' : active, ' text-blue-200 hover:bg-blue-700 hover:text-white' : !active }"
                    class="transition-colors ease-in-out group flex items-center rounded-md px-2 py-2 text-sm font-semibold">
                    <svg class="transition-colors ease-in-out text-current mr-4 h-6 w-6 flex-shrink-0 text-blue-200 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                    {{ __('Billing') }}
                </a>

                <a x-data="{ active: '{{ request()->routeIs('profile.*') }}' }" href="{{ route('profile.show') }}"
                    :class="{ 'bg-blue-700 text-white' : active, ' text-blue-200 hover:bg-blue-700 hover:text-white' : !active }"
                    class="transition-colors ease-in-out group flex items-center rounded-md px-2 py-2 text-sm font-semibold">

                    <svg class="transition-colors ease-in-out text-current mr-4 h-6 w-6 flex-shrink-0 text-blue-200 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    
                    {{ __('Profile') }}
                </a>

                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <a x-data="{ active: '{{ request()->routeIs('teams.*') }}' }" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                    :class="{ 'bg-blue-700 text-white' : active, ' text-blue-200 hover:bg-blue-700 hover:text-white' : !active }"
                    class="transition-colors ease-in-out group flex items-center rounded-md px-2 py-2 text-sm font-semibold">
                    <svg class="transition-colors ease-in-out text-current mr-4 h-6 w-6 flex-shrink-0 text-blue-200 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                    {{ __('Team') }}
                </a>
                @endif

                <div class="pt-20 px-2">
                    <div class="text-sm font-semibold leading-6 text-blue-200">Switch team</div>
                    <ul role="list" class="-mx-2 mt-2 space-y-1">

                        @foreach (Auth::user()->allTeams() as $team)
                            <li>
                                <form method="POST" action="{{ route('current-team.update') }}" x-data>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="team_id" value="{{ $team->id }}">
                                    <button type="submit" class="@if (Auth::user()->isCurrentTeam($team)) bg-blue-700 text-white @else text-blue-200 hover:text-white hover:bg-blue-700 @endif transition-colors ease-in-out group flex w-full gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                        <span class="uppercase flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-blue-400 bg-blue-500 text-[0.625rem] font-medium text-white">{{ $team->name[0] }}</span>
                                        <span class="truncate">{{ $team->name }}</span>
                                    </button>
                                </form>
                            </li>
                        @endforeach
                        
                        <li>
                            <a href="{{ route('teams.create') }}" class="transition-colors ease-in-out text-blue-200 hover:text-white text-xs font-semibold px-2 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" />
                                </svg>                                  
                                <span>Create new team</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </nav>

            <div class="flex flex-shrink-0 border-t border-blue-400 bg-blue-500 p-4">
                
                <div class="flex items-center justify-between w-full">
                    <div class="flex items-center">
                        <div>
                            <img class="inline-block h-9 w-9 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white"><a href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a></p>
                            <p class="text-xs font-medium text-indigo-200 group-hover:text-white"><a href="{{ route('profile.show') }}">Profile</a></p>
                        </div>
                    </div>
                    <div class="text-blue-200 hover:text-white">
                        <form method="POST" action="{{ route('logout') }}" x-data x-ref="logout">
                            @csrf
                            <svg @click.prevent="$refs.logout.submit()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                        </form>
                    </div>
                  </div>
                
            </div>

        </div>
        
    </div>

</div>