<div class="pt-2 pb-3 space-y-1">
    @foreach ($links as $link)
    @if ($link)
    <x-responsive-nav-link wire:navigate href="{{ $link['url'] }}" :active="$link['isActive']">
        <span>
            {{ $link['label'] }}
        </span>
        @isset($link['blinkBdge'])
        <span class="relative flex w-3 h-3 ms-auto">
            <span class="absolute inline-flex w-full h-full rounded-full opacity-75 animate-ping bg-primary-400"></span>
            <span class="relative inline-flex w-3 h-3 rounded-full bg-primary-500"></span>
        </span>
        @endisset
    </x-responsive-nav-link>
    @endif
    @endforeach
</div>
