<div>
    <x-card>
        <div class="flex gap-2 mx-2 overflow-x-auto md:overflow-x-hidden md:flex-col md:gap-0 md:-mx-4">
            <x-profile-menu-link icon="heroicon-o-user" :title="__('Manage Account')" :url="route('profile.show')"
                :isActive="request()->routeIs('profile.show')" />

            <x-profile-menu-link icon="heroicon-o-plus-circle" :title="__('Edit Additional Data')"
                :url="route('profile.additional')" :isActive="request()->routeIs('profile.additional')" />

            <x-profile-menu-link icon="heroicon-o-ticket" :title="__('Tickets')" :url="route('ticket')"
                :isActive="request()->routeIs('ticket')" :badge="auth()->user()->tickets()->count()" />

            {{-- <x-profile-menu-link icon="heroicon-o-gift" :title="__('Gifts')" :url="route('gift')"
                :isActive="request()->routeIs('gift')" /> --}}
        </div>
    </x-card>
</div>
