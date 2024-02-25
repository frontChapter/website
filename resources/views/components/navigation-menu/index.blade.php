<nav x-data="{ open: false }"
    class="sticky top-0 bg-white border-b border-secondary-200 dark:bg-secondary-800 dark:border-secondary-700">
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
                                <x-dropdown.item wire:navigate icon="user-circle"
                                    href="{{ route('profile.show', [auth()->user()]) }}">
                                    {{ __('Manage Account') }}
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
