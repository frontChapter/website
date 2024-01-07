<div class="pt-2 pb-3 space-y-1">
    @foreach ($links as $link)
    @if ($link)
    <x-responsive-nav-link wire:navigate href="{{ $link['url'] }}" :active="$link['isActive']">
        {{ $link['label'] }}
    </x-responsive-nav-link>
    @endif
    @endforeach
</div>
