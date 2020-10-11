<nav x-data="{ open: false }" class="py-10">
    <!-- Primary Navigation Menu -->
    <div class="max-w-5xl mx-auto">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="block text-xl lg:inline-block mr-12 font-black">{{ config('app.name') }}</a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:block">
                    <div class="flex items-baseline space-x-12">
                        <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                            {{ __('About') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('listings.index') }}" :active="request()->routeIs('listings.*')">
                            {{ __('Listings') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('tags.index') }}" :active="request()->routeIs('tags.*')">
                            {{ __('Tags') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6 space-x-12">
                    @auth
                        <x-nav-link href="{{ route('listings.create') }}" :active="request()->routeIs('listings.create')">
                            {{ __('Create listing') }}
                        </x-nav-link>

                        <div class="flex items-center space-x-3">
                            <a href="{{ route('conversations.index') }}" class="p-1 border-2 border-transparent text-gray-500 rounded-full hover:text-gray-800 focus:outline-none focus:text-white focus:bg-gray-800" aria-label="Notifications">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </a>

                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @else
                        <x-nav-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Hamburger -->
            <div class="px-3 flex md:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center rounded-md text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800" x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="py-4 space-y-4">
            <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('listings.index') }}" :active="request()->routeIs('listings.*')">
                {{ __('Listings') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('tags.index') }}" :active="request()->routeIs('tags.*')">
                {{ __('Tags') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 border-t border-gray-200 space-y-4">
            @auth
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>

                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="mt-1 text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            @endif

            <div class="space-y-4" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">
                @auth
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-responsive-nav-link>
                    </form>
                @else
                    <x-responsive-nav-link href="{{ route('login') }}">
                        {{ __('Login') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                @endif
            </div>
        </div>
    </div>
</nav>
