<nav x-data="{ open: false }" class="bg-white py-4">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <svg viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" class="block h-9 w-auto">
                            <path d="M23.5102041,9.79591837 L23.5102041,9.79591837 C15.3912141,9.79591837 8.81632653,16.3708059 8.81632653,24.4897959 C8.81632653,32.6087859 15.3912141,39.1836735 23.5102041,39.1836735 C31.6291941,39.1836735 38.2040816,32.6087859 38.2040816,24.4897959 C38.2040816,16.3708059 31.6291941,9.79591837 23.5102041,9.79591837 Z" fill="#00C5CD"></path>
                            <path d="M4.91811539,24.4897959 C2.19299572,24.4897959 0,26.6989166 0,29.4079113 L0,43.0818846 C0,45.8070043 2.20912069,48 4.91811539,48 L18.5920887,48 C21.3172084,48 23.5102041,45.7908793 23.5102041,43.0818846 L23.5102041,24.4897959 L4.91811539,24.4897959 Z" fill="#BB62F4"></path>
                            <path d="M9.79591837,23.5102041 C9.79591837,31.6291941 16.3708059,38.2040816 24.4897959,38.2040816 C24.4897959,38.2040816 24.4897959,38.2040816 24.4897959,38.2040816 L24.4897959,23.5102041 L9.79591837,23.5102041 L9.79591837,23.5102041 Z" fill="#7528FF"></path>
                            <path d="M43.0691416,0 L29.4045404,0 C26.6812886,0 24.4897959,2.20760655 24.4897959,4.91474451 L24.4897959,23.5102041 L43.0852555,23.5102041 C45.8085074,23.5102041 48,21.3025975 48,18.5954596 L48,4.93085843 C47.9838861,2.20760655 45.7762795,0 43.0691416,0 Z" fill="#BB62F4"></path>
                            <path d="M23.5102041,9.79591837 L23.5102041,24.4897959 L38.2040816,24.4897959 C38.2040816,16.3708059 31.6291941,9.79591837 23.5102041,9.79591837 Z" fill="#7528FF"></path>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('listings.index') }}" :active="request()->routeIs('listings.*')">
                        {{ __('Listings') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-8">
                @auth
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="flex items-center leading-6 font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            @endif
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
                @else
                    <x-nav-link href="{{ route('login') }}">
                        {{ __('Login') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-nav-link>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>

                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            @endif

            <div class="mt-3 space-y-1">
                @auth
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-responsive-nav-link>
                    </form>
                @else
                    <x-jet-responsive-nav-link href="{{ route('login') }}">
                        {{ __('Login') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-jet-responsive-nav-link>
                @endif
            </div>
        </div>
    </div>
</nav>
