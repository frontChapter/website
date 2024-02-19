<nav x-data="{ open: false }"
    class="bg-white border-b border-secondary-100 dark:bg-secondary-800 dark:border-secondary-700">
    <!-- Primary Navigation Menu -->
    <div class="container px-4 mx-auto sm:px-2 md:px-0">
        <div class="flex h-16 gap-2">
            <div class="flex">
                <div class="flex items-center gap-2 shrink-0">
                    <!-- Hamburger -->
                    <div class="lg:hidden">
                        <x-dropdown :align="app()->getLocale() === 'fa' ? 'right' : 'left'" :persistent="1" class="text-start">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <x-button class="!px-2" @click="open = ! open" flat light>
                                        @svg('heroicon-s-bars-3', 'w-8 h-8')
                                    </x-button>
                                </span>
                            </x-slot>

                            @foreach ($links as $link)
                            <x-dropdown.item :href="$link['url']">{{ $link['label'] }}</x-dropdown.item>
                            @endforeach
                        </x-dropdown>
                    </div>

                    <!-- Logo -->
                    <a wire:navigate href="{{ route('conf1402') }}">
                        <x-application-mark class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <x-navigation-menu.links :$links />
            </div>

            <div class="flex items-center gap-4 ms-auto">
                @livewire('tools.language-select')

                @auth()
                <div class="flex sm:items-center">
                    {{--
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative">
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
                    @endif --}}

                    <!-- Settings Dropdown -->
                    <div class="relative pt-1">
                        <x-dropdown :align="app()->getLocale() === 'fa' ? 'left' : 'right'" class="text-start">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center gap-2 text-sm font-medium leading-4 transition duration-150 ease-in-out border border-transparent rounded-md text-secondary-500 dark:text-secondary-400 hover:text-secondary-700 dark:hover:text-secondary-300 focus:outline-none focus:bg-secondary-50 focus:border-secondary-400 active:border-secondary-400 dark:focus:border-secondary-600 dark:active:border-secondary-600 dark:focus:bg-secondary-700 active:bg-secondary-50 dark:active:bg-secondary-700">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <x-avatar squared sm src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                        @endif
                                        <span class="hidden lg:block">
                                            {{ Auth::user()->name }}
                                        </span>

                                        <svg class="me-1.5 h-4 w-4 hidden lg:block" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <!-- Account Management -->
                            {{-- <x-dropdown.header separator :label="__('Manage Account')"> --}}
                                <x-dropdown.item wire:navigate icon="user"
                                    href="{{ route('profile', [auth()->user()]) }}">
                                    {{ __('Profile') }}
                                </x-dropdown.item>
                                <x-dropdown.item wire:navigate icon="pencil-alt"
                                    href="{{ route('profile.show', [auth()->user()]) }}">
                                    {{ __('Edit Profile') }}
                                </x-dropdown.item>
                                @hasanyrole(['Super Admin', 'admin', 'admin-panel'])
                                <x-dropdown.item separator icon="collection" :href="route('filament.admin.home')">
                                    {{ __('Admin Panel') }}
                                </x-dropdown.item>
                                @endhasanyrole
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown.item wire:navigate href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                    </a>
                                </x-dropdown.item>
                                @endif
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown.item separator icon="logout" href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown.item>
                                </form>
                                {{--
                            </x-dropdown.header> --}}
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
        </div>
    </div>
</nav>
