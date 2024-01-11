<nav x-data="{ open: false }"
    class="bg-white border-b border-secondary-100 dark:bg-secondary-800 dark:border-secondary-700">
    <!-- Primary Navigation Menu -->
    <div class="container px-4 mx-auto sm:px-2 md:px-0">
        <div class="flex h-16 gap-2">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('conf1402') }}">
                        <x-application-mark class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <x-navigation-menu.links :$links />
            </div>

            <div class="flex items-center gap-4 ms-auto">
                @auth()
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative ms-3">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out bg-white border border-transparent rounded-md text-secondary-500 dark:text-secondary-400 dark:bg-secondary-800 hover:text-secondary-700 dark:hover:text-secondary-300 focus:outline-none focus:bg-secondary-50 dark:focus:bg-secondary-700 active:bg-secondary-50 dark:active:bg-secondary-700">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-secondary-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown.item wire:navigate
                                        :href="route('teams.show', Auth::user()->currentTeam->id)">
                                        {{ __('Team Settings') }}
                                    </x-dropdown.item>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-dropdown.item wire:navigate :href="route('teams.create')">
                                        {{ __('Create New Team') }}
                                        </a>
                                    </x-dropdown.item>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                    <div class="border-t border-secondary-200 dark:border-secondary-600"></div>

                                    <div class="block px-4 py-2 text-xs text-secondary-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" />
                                    @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endif

                    <!-- Settings Dropdown -->
                    <div class="relative pt-1 ms-3">
                        <x-dropdown align="left" class="text-start">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center gap-2 text-sm font-medium leading-4 transition duration-150 ease-in-out border border-transparent rounded-md text-secondary-500 dark:text-secondary-400 hover:text-secondary-700 dark:hover:text-secondary-300 focus:outline-none focus:bg-secondary-50 focus:border-secondary-400 active:border-secondary-400 dark:focus:border-secondary-600 dark:active:border-secondary-600 dark:focus:bg-secondary-700 active:bg-secondary-50 dark:active:bg-secondary-700">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <x-avatar squared sm src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                        @endif
                                        {{ Auth::user()->name }}

                                        <svg class="me-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <!-- Account Management -->
                            <x-dropdown.header :label="__('Manage Account')">
                                <x-dropdown.item href="{{ route('profile', [auth()->user()]) }}">
                                    {{ __('Profile') }}
                                </x-dropdown.item>
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown.item wire:navigate href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                    </a>
                                </x-dropdown.item>
                                @endif
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown.item href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown.item>
                                </form>
                            </x-dropdown.header>
                        </x-dropdown>
                    </div>
                </div>
                @endauth

                @guest
                <div class="flex items-center gap-2">
                    <x-button light wire:navigate :href="route('login')" :label="__('Login')" />
                    <x-button icon="user-add" primary wire:navigate :href="route('register')" :label="__('Register')" />
                </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 transition duration-150 ease-in-out rounded-md text-secondary-400 dark:text-secondary-500 hover:text-secondary-500 dark:hover:text-secondary-400 hover:bg-secondary-100 dark:hover:bg-secondary-900 focus:outline-none focus:bg-secondary-100 dark:focus:bg-secondary-900 focus:text-secondary-500 dark:focus:text-secondary-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <x-navigation-menu.responsive-links :$links />

        @auth
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-secondary-200 dark:border-secondary-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="shrink-0 me-3">
                    <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    <div class="text-base font-medium text-secondary-800 dark:text-secondary-200">{{ Auth::user()->name
                        }}</div>
                    <div class="text-sm font-medium text-secondary-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile', [auth()->user()]) }}"
                    :active="request()->routeIs('profile')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="border-t border-secondary-200 dark:border-secondary-600"></div>

                <div class="block px-4 py-2 text-xs text-secondary-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                    :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-responsive-nav-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-responsive-nav-link>
                @endcan

                <!-- Team Switcher -->
                @if (Auth::user()->allTeams()->count() > 1)
                <div class="border-t border-secondary-200 dark:border-secondary-600"></div>

                <div class="block px-4 py-2 text-xs text-secondary-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-switchable-team :team="$team" component="responsive-nav-link" />
                @endforeach
                @endif
                @endif
            </div>
        </div>
        @endauth
    </div>
</nav>
