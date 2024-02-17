<div class="flex items-center my-auto">
    @if ($locale === 'en')
    <x-avatar wire:loading.remove x-on:click="$wire.set('locale', 'fa')" class="cursor-pointer" xs squared :border="false" label="FA" />
    @else
    <x-avatar wire:loading.remove x-on:click="$wire.set('locale', 'en')" class="cursor-pointer" xs squared :border="false" label="EN" />
    @endif
    <x-loading-icon wire:loading wire:loading.target='locale' size="w-5 h-5" />
</div>
