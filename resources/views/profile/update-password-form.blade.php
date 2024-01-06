<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-input :label="__('Current Password')" type="password" wire:model="state.current_password" name="current_password" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input :label="__('New Password')" type="password" wire:model="state.password" name="password" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input :label="__('Password confirmation')" type="password" wire:model="state.password_confirmation" name="password_confirmation" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button primary type="submit" spinner="updatePassword" :label="__('Save')" />
    </x-slot>
</x-form-section>
