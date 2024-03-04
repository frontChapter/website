<div class="flex gap-3 shadow items-stretch text-secondary-200 rounded {{ $bgColor }}">
    <div class="flex gap-2 w-full p-4 flex-col lg:flex-row">
        <div class="w-full">
            <h3 class="mb-1 text-xl font-semibold leading-tight">
                {{ $title }}
            </h3>
            <p>{{ $description }}</p>
            @isset($href)
            <div class="hidden lg:block">
                <x-button sm :rightIcon="app()->getLocale() === 'fa' ? 'chevron-left' : 'chevron-right'" class="mt-2 min-w-max" dark
                    target="_blank" :label="__('Apply Coupon')" :$href />
            </div>
            @endisset
        </div>

        <div class="flex lg:flex-col items-center lg:justify-center text-sm min-w-max gap-4 lg:gap-2">
            @isset($value)
            <div class="lg:w-full">
                <p class="opacity-85">
                    {{ __('Discount amount') }}
                </p>
                <p class="font-semibold">{{ $value }}</p>
            </div>
            @isset($expire)
            <div class="border-r-2 lg:border-r-0 lg:border-b-2 border-white/30 h-4 lg:h-0 lg:w-full"></div>
            @endisset
            @endisset
            @isset($expire)
            <div class="lg:w-full">
                <p class="opacity-85">
                    {{ __('Expired at') }}
                </p>
                <p class="font-semibold">{{ $expire }}</p>
            </div>
            @endisset
        </div>
    </div>

    <div class="flex flex-col min-w-36 justify-center items-center bg-white/15 p-4 gap-1">
        <p>
            {{ __('Discount code') }}
        </p>
        <x-badge class="font-mono shadow-lg" white lg :label="$code" />
        @isset($href)
        <div>
            <x-button sm :rightIcon="app()->getLocale() === 'fa' ? 'chevron-left' : 'chevron-right'"
                class="mt-3 min-w-max lg:hidden" dark target="_blank" :label="__('Apply Coupon')" :$href />
        </div>
        @endisset
    </div>
</div>
