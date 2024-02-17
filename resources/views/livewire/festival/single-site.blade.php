<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
        {{ $site->name }}
    </h2>
</x-slot>
<div class="container mx-auto my-8">
    <div class="flex flex-col gap-8">
        <x-card>
            <div class="flex items-center gap-4">
                <x-avatar squared size="h-24 w-24" :src="$site->logo_url" :alt="$site->name" />
                <div>
                    <h2 class="mb-2 text-2xl font-bold md:text-3xl">
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
                <div class="flex flex-col gap-1 ms-auto">
                    <x-button target="_blank" primary outline icon="external-link" :href="$site->url"
                        :label="__('Visit Site')" />
                    @auth
                        <livewire:festival.voting :site="$site" />
                    @else
                        <x-button green :href="route('login')" icon="lock-closed" :label="__('Login to vote')" />
                    @endauth
                </div>
            </div>
        </x-card>

        <livewire:festival.votes :site="$site" />
    </div>
</div>
