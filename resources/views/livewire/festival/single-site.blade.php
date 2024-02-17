<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
        {{ $site->name }}
    </h1>
</x-slot>
<div class="container mx-auto my-8">
    <div class="flex flex-col gap-8">
        <x-card>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-6">
                <x-avatar class="order-1" squared size="w-24 h-24" :src="$site->logo_url" :alt="$site->name" />
                <div class="order-3 md:order-2">
                    <h2 class="hidden mb-2 text-xl font-bold md:block md:text-3xl">
                        {{ $site->name }}
                    </h2>
                    <div class="flex items-center gap-3">
                        <a wire:navigate href="{{ route('profile', ['user' => $site->user->username]) }}"
                            class="flex items-center gap-1 text-xl leading-none text-primary-500 dark:hover:text-primary-400 hover:text-primary-600">
                            <x-avatar xs :src="$site->user->profile_photo_url" :alt="$site->user->name" />
                            {{ $site->user->name }}
                        </a>
                        <div class="w-1.5 h-1.5 bg-gray-500 rounded-full"></div>
                        <p class="text-xl opacity-90">
                            {{ $site->url }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-col items-stretch order-2 gap-2 md:order-3 ms-auto">
                    @auth
                    <livewire:festival.voting :site="$site" />
                    @else
                    <x-button green :href="route('login', ['redirect', route('festival-site.single', $site)])" icon="lock-closed" :label="__('Login to vote')" />
                    @endauth
                    <x-button target="_blank" primary outline icon="external-link" :href="$site->url"
                        :label="__('Visit Site')" />
                </div>
            </div>
        </x-card>

        <livewire:festival.votes :site="$site" />
    </div>
</div>
