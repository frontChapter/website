@props([
    'title' => '',
    'url' => '',
    'icon' => '',
    'badge' => '',
    'badgeColor' => 'primary',
    'isActive' => false,
])

@php
    $class = 'flex items-center w-full gap-2 px-4 py-3 text-lg transition-colors rounded-lg min-w-max md:rounded-none dark:hover:bg-secondary-900 hover:bg-secondary-50';
    if($isActive) {
        $class .= " md:border-s-2 md:border-s-primary-500 text-black dark:text-white dark:bg-secondary-700 bg-secondary-100";
    }
@endphp

<a
    {{ $attributes->except(['icon', 'title', 'url'])->merge(["class" => $class]) }}
    href="{{ $url }}"
    wire:navigate
>
    @if(!empty($icon))
    @svg($icon, 'h-6 w-6')
    @endif
    <span>{{ $title }}</span>

    @if($badge !== '')
        <div class="ms-auto">
            <x-badge :color="$badgeColor" :label="$badge" />
        </div>
    @endif
</a>
