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
        'primary' => 'bg-primary-100 text-primary-700 border-primary-700 dark:bg-gray-800 dark:text-primary-300 dark:border-primary-300',
        'info' => 'bg-info-100 text-info-700 border-info-700 dark:bg-gray-800 dark:text-info-300 dark:border-info-300',
        'warning' => 'bg-warning-100 text-warning-700 border-warning-700 dark:bg-gray-800 dark:text-warning-300 dark:border-warning-300',
        'danger' => 'bg-error-100 text-error-700 border-error-700 dark:bg-gray-800 dark:text-error-300 dark:border-error-300',
    ];

@endphp

<div {{ $attributes->merge(["class" => "flex flex-col sm:flex-row rounded-lg border px-4 py-3 sm:items-center sm:justify-between gap-3 " . $colors[$type]]) }}
    role="alert">
    <div class="flex flex-col w-full gap-2 sm:flex-row">
        <div class="flex gap-2">
            @if ($icon)
                <x-icon class="w-6 h-6" :name="$icon" />
            @endif
            @if ($title)
                <p class="font-medium sm:hidden text-md">{{ __($title) }}</p>
            @endif
        </div>
        <div class="w-full">
            @if ($title)
                <p class="hidden font-medium sm:block text-md">{{ __($title) }}</p>
            @endif
            <div class="w-full @if(!empty($title)) mt-1 @endif">
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
