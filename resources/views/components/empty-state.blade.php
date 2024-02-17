<div
    class="flex flex-col w-full max-w-3xl gap-6 p-4 py-12 mx-auto text-center @if(!isset($borderless)) border border-2 border-dashed rounded-lg border-secondary-300 @endif lg:py-24">
    @isset($icon)
    <div class="text-secondary-600">
        {{ $icon }}
    </div>
    @endisset
    @isset ($title)
    <h4 class="text-2xl font-semibold">
        {{ $title }}
    </h4>
    @endisset
    @isset($description)
    <p class="text-lg font-light text-secondary-700 dark:text-secondary-300">
        {{ $description }}
    </p>
    @endisset
</div>
