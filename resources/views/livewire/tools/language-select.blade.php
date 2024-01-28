<div class="flex my-auto items-center">
    @if ($locale === 'en')
    <x-avatar wire:loading.remove x-on:click="$wire.set('locale', 'fa')" class="cursor-pointer" xs squared :border="false" src="{{ asset('images/ir-flag.png') }}" lable="FA" />
    @else
    <x-avatar wire:loading.remove x-on:click="$wire.set('locale', 'en')" class="cursor-pointer" xs squared :border="false" src="{{ asset('images/us-flag.png') }}" lable="EN" />
    @endif
    <x-loading-icon wire:loading wire:loading.target='locale' size="w-5 h-5" />
</div>
