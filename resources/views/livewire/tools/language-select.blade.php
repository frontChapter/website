<div class="flex items-center my-auto">
    @if ($locale === 'en')
    <a wire:loading.remove x-on:click="$wire.set('locale', 'fa')" class="p-1 cursor-pointer">FA</a>
    @else
    <a wire:loading.remove x-on:click="$wire.set('locale', 'en')" class="p-1 cursor-pointer">EN</a>
    @endif
    <x-loading-icon wire:loading wire:loading.target='locale' size="w-5 h-5" />
</div>
