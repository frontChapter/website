<div class="flex flex-col gap-3 lg:flex-row items-center p-4 text-secondary-200 rounded {{ $bgColor }}">
    <div class="w-full">
        <h3 class="mb-1 text-xl font-semibold leading-tight">
            {{ $title }}
        </h3>
        <p>{{ $description }}</p>
    </div>

    <div class="flex items-center justify-start w-full gap-4 lg:justify-end ms-auto">
        <div class="flex flex-col w-full gap-1 lg:w-max">
            <div class="flex items-center justify-start w-full gap-2 lg:justify-end">
                <p>
                    {{ __('Discount code') }}:
                </p>
                <x-badge class="font-mono ms-auto lg:ms-0" white lg :label="$code" />
            </div>
            @isset($expire)
            <p class="text-end">{{ __('Expires at: :expiration', ['Expiration' => $expire]) }}</p>
            @endisset
        </div>
        @isset($href)
        <x-button class="ms-auto lg:ms-0 min-w-max" dark target="_blank" :label="__('Apply Coupon')" :$href />
        @endisset
    </div>
</div>
