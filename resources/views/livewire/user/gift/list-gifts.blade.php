<x-profile-layout>
    <x-slot name="title">
        <h1 class="text-3xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
            {{ __('Gifts List') }}
        </h1>
    </x-slot>

    <div class="flex flex-col gap-4">
        @foreach ($gifts as $gift)
            <x-gift-card :href="$gift->link" :title="$gift->title" :description="$gift->description" :code="$gift->code" bgColor="bg-teal-600" />
        @endforeach
        @foreach ($tickets as $ticket)
            <x-gift-card :title="__('Pachim')" :description="__('New experience in server and site management')" :code="$ticket->is_vip ? 'fchapter' : 'pchapter'" bgColor="bg-sky-600" />
            <x-gift-card :title="__('Roocket')" :description="__('Roocket, the story of the beginning of a programmer')" :code="$ticket->is_vip ? 'fchapter' : 'rchapter'" bgColor="bg-rose-600" />
            <x-gift-card expire="۱۱۴۰۲/۱۲/۱۹" href="https://console.liara.ir/rewards" :title="__('Liara')" :description="__('In less than 5 minutes, run your program on the server')" code="{{ $ticket->code }}" bgColor="bg-teal-600" />
        @endforeach

        {{-- @if (count($gifts) === 0 && count($tickets) === 0) --}}
        <x-empty-state :title="__('There are no gifts.')">
            <x-slot name="icon">
                <x-heroicon-s-gift class="w-24 h-24 mx-auto" />
            </x-slot>
        </x-empty-state>
        {{-- @endif --}}
    </div>

</x-profile-layout>
