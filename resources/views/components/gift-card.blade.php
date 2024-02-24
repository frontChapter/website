<div class="flex items-center p-4 rounded {{ $bgColor }}">
    <div>
        <h3 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
            {{ $title }}
        </h3>
        <p>{{ $description }}</p>
    </div>

    <div class="flex items-center gap-1 ms-auto">
        <p>
            {{ __('Discount code') }}:
        </p>
        <x-badge white lg :label="$code"/>
    </div>
</div>
