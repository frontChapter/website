<div class="flex gap-3 shadow items-stretch text-secondary-200 rounded {{ $bgColor }}">
    <div class="flex flex-col w-full gap-2 p-4 lg:flex-row">
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

        <div class="flex items-center gap-4 text-sm lg:flex-col lg:justify-center min-w-max lg:gap-2">
            @if(!empty($value))
            <div class="lg:w-full">
                <p class="opacity-85">
                    {{ __('Discount amount') }}
                </p>
                <p class="font-semibold">{{ $value }}</p>
            </div>
            @if(!empty($expire))
            <div class="h-4 border-r-2 lg:border-r-0 lg:border-b-2 border-white/30 lg:h-0 lg:w-full"></div>
            @endif
            @endif
            @if(!empty($expire))
            <div class="lg:w-full">
                <p class="opacity-85">
                    {{ __('Expired at') }}
                </p>
                <p class="font-semibold">{{ $expire }}</p>
            </div>
            @endif
        </div>
    </div>

    <div class="flex flex-col items-center justify-center gap-1 p-4 min-w-36 bg-white/15">
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
