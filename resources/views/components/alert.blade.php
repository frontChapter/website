@props([
    'type' => 'info',
    'icon' => null,
    'title' => null,
    'description' => null,
    'slot' => null,
    'actions' => null,
])

@php
    $colors = [
        'primary' => 'bg-primary-50 border-primary-200 text-primary-900 dark:bg-gray-800 dark:text-primary-100',
        'info' => 'bg-info-50 border-info-200 text-info-900 dark:bg-gray-800 dark:text-info-100',
        'warning' => 'bg-warning-50 border-warning-200 text-warning-900 dark:bg-gray-800 dark:text-warning-100',
        'danger' => 'bg-error-50 border-error-200 text-error-900 dark:bg-gray-800 dark:text-error-100',
    ];

    $iconColors = [
        'primary' => 'text-primary-300 dark:text-primary-700',
        'info' => 'text-info-300 dark:text-info-700',
        'warning' => 'text-warning-300 dark:text-warning-700',
        'danger' => 'text-error-300 dark:text-error-700',
    ];

@endphp

<div {{ $attributes->merge(["class" => "flex flex-col sm:flex-row border rounded-lg px-4 py-3 sm:items-center sm:justify-between gap-3 " . $colors[$type]]) }}
    role="alert">
    <div class="flex flex-col w-full gap-2 sm:flex-row">
        <div class="flex gap-2 {{ $iconColors[$type] }}">
            @if ($icon)
                @svg("heroicon-s-$icon", 'w-6 h-6')
            @endif
            @if ($title)
                <p class="text-base font-medium sm:hidden">{{ __($title) }}</p>
            @endif
        </div>
        <div class="w-full">
            @if ($title)
                <p class="hidden text-base font-medium sm:block">{{ __($title) }}</p>
            @endif
            <div class="w-full @if(!empty($title)) mt-1 opacity-95 text-sm @endif">
                @if ($description)
                    <p>{{ __($description) }}</p>
                @endif

                @if ($slot)
                    {!! $slot !!}
                @endif
            </div>
        </div>
    </div>
    @if ($actions)
        <div class="flex gap-2 min-w-max">
            {{ $actions }}
        </div>
    @endif
</div>
