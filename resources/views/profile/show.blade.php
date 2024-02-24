<x-profile-layout>
    <x-slot name="title">
        <h1 class="text-3xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
            {{ __('Manage Account') }}
        </h1>
    </x-slot>

    <div>
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        @livewire('profile.update-profile-information-form')

        <x-section-border />
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        <div class="mt-10 sm:mt-0">
            @livewire('profile.update-password-form')
        </div>

        <x-section-border />
        @endif

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <div class="mt-10 sm:mt-0">
            @livewire('profile.two-factor-authentication-form')
        </div>

        <x-section-border />
        @endif

        <div class="mt-10 sm:mt-0">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <x-section-border />

        <div class="mt-10 sm:mt-0">
            @livewire('profile.delete-user-form')
        </div>
        @endif
    </div>
</x-profile-layout>
