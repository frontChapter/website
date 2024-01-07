<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    @foreach ($links as $link)
    @if ($link)
    <x-nav-link wire:navigate href="{{ $link['url'] }}" :active="$link['isActive']">
        {{ $link['label'] }}
    </x-nav-link>
    @endif
    @endforeach
</div>
