<div class="flex flex-col gap-3 lg:flex-row items-center p-4 rounded {{ $bgColor }}">
    <div class="w-full">
        <h3 class="mb-1 text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
            {{ $title }}
        </h3>
        <p>{{ $description }}</p>
    </div>

    <div class="flex items-center justify-between w-full gap-2 lg:justify-end ms-auto">
        <p>
            {{ __('Discount code') }}:
        </p>
        <x-badge white lg :label="$code"/>
    </div>
</div>
