@php
    $links = [
    [
    'label' => __('Account'),
    'url' => route('profile.show'),
    'isActive' => request()->routeIs('profile.show'),
    ],
    [
    'label' => __('Additional Data'),
    'url' => route('profile.additional'),
    'isActive' => request()->routeIs('profile.additional'),
    ],
];
@endphp

<x-navigation-menu.links :$links />
<div class="flex items-center h-full sm:hidden">
    <x-dropdown align="left" class="text-start">
        <x-slot name="trigger">
            <span class="inline-flex rounded-md">
                <x-button class="!px-2" @click="open = ! open" outline light>
                    @svg('heroicon-s-ellipsis-vertical', 'w-6 h-6')
                </x-button>
            </span>
        </x-slot>

        @foreach ($links as $link)
            <x-dropdown.item :href="$link['url']">{{ $link['label'] }}</x-dropdown.item>
        @endforeach
    </x-dropdown>
</div>
