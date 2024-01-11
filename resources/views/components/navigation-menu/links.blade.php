<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    @foreach ($links as $link)
    @if ($link)
    <x-nav-link wire:navigate href="{{ $link['url'] }}" :active="$link['isActive']">
        @isset($link['blinkBdge'])
        <span class="relative flex w-3 h-3 me-3">
            <span class="absolute inline-flex w-full h-full rounded-full opacity-75 animate-ping bg-primary-400"></span>
            <span class="relative inline-flex w-3 h-3 rounded-full bg-primary-500"></span>
        </span>
        @endisset
        <span>
            {{ $link['label'] }}
        </span>
    </x-nav-link>
    @endif
    @endforeach
</div>
