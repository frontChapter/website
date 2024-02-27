<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
        {{ $site->name }}
    </h1>
</x-slot>
<x-slot:headerAction>
    @can('update', $site)
    <div class="flex items-center">
        <x-button light outline icon="pencil-alt" :href="route('festival-site.edit', $site)" :label="__('Edit Site')" />
    </div>
    @endcan
</x-slot:headerAction>
<div class="container mx-auto my-8">
    <div class="flex flex-col gap-8">
        <x-card>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-6">
                <x-avatar class="order-1" squared size="w-24 h-24" :src="$site->logo_url" :alt="$site->name" />
                <div class="order-3 w-full md:order-2 md:w-fit">
                    <h2 class="hidden mb-2 text-xl font-bold md:block md:text-3xl">
                        {{ $site->name }}
                    </h2>
                    <div class="flex items-center w-full gap-3">
                        <a wire:navigate href="{{ route('profile', ['user' => $site->user->username]) }}"
                            class="flex items-center gap-1 text-xl leading-none min-w-max text-primary-500 dark:hover:text-primary-400 hover:text-primary-600">
                            <x-avatar xs :src="$site->user->profile_photo_url" :alt="$site->user->name" />
                            {{ $site->user->name }}
                        </a>
                        <div class="w-1.5 h-1.5 bg-gray-500 rounded-full"></div>
                        <a target="_blank" dir="ltr" href="{{ $site->url }}" class="overflow-hidden text-xl transition-colors text-nowrap text-ellipsis opacity-90 hover:text-primary-500">
                            {{ $site->url }}
                        </a>
                        <td col></td>
                    </div>
                </div>
                <div class="flex flex-col items-stretch order-2 gap-2 md:order-3 ms-auto">
                    {{-- @auth
                    @if ($isValidUrl)
                    <livewire:festival.voting :site="$site" />
                    @endif
                    @else
                    <x-button green :href="route('login', ['redirect' => route('festival-site.single', $site)])" icon="lock-closed" :label="__('Login to vote')" />
                    @endauth --}}
                    <x-alert icon="information-circle" :description="__('The voting deadline is over 😿')" />
                    <x-button target="_blank" primary outline icon="external-link" :href="$site->url"
                        :label="__('Visit Site')" />
                </div>
            </div>
        </x-card>
        @if (!$isValidUrl && auth()->id() === $site->user_id)
        <x-alert type="error" icon="exclamation-triangle" :title="__('Site hosting not valid')"
            :description="__('To participate in the contest, your site must be hosted on Liara')">
            <x-slot:actions>
                <x-button negative icon="pencil-alt" :href="route('festival-site.edit', $site)" :label="__('Edit Site')" />
            </x-slot:actions>
        </x-alert>
        @endif
        <livewire:festival.votes :site="$site" />
        <livewire:festival.sites-poster-generator :site="$site" />
    </div>
</div>
