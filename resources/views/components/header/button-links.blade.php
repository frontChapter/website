<div class="flex gap-2">
    @foreach ($links as $link)
    <a class=""
        :light="!$link['isActive']"
        :primary="$link['isActive']"
        wire:navigate
        href="$link['url']"
    >
    {{ $link['label'] }}
    </a>
    @endforeach
</div>
