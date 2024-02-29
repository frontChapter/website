<x-slot name="header">
    <h2 class="text-lg font-semibold leading-tight sm:text-xl text-secondary-800 dark:text-secondary-200">
        {{ __('تصاویر همایش ۱۴۰۲') }}
    </h2>
</x-slot>

<div class="container mx-auto my-8 md:h-[45rem] max-h-full">
    <x-card cardClasses="h-full" class="flex flex-col items-center justify-center gap-8">
        <img class="mx-auto rounded-xl"  src="{{ asset('images/happy-carrot.jpg') }}">
        <div class="flex flex-col gap-2 text-center">
            <h2 class="text-3xl font-bold">محل الصاق تصاویر امسال</h2>
            <p class="">بزودی در این مکان تصاویر همایش ثبت می‌گردد</p>
        </div>
    </x-card>
</div>
