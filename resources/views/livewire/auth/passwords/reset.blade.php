@section('title', __('Reset Password'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center">
            {{ __('Reset Password') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card>
            <form wire:submit.prevent="resetPassword">
                <input wire:model="token" type="hidden">

                <div class="flex flex-col gap-4">
                    <x-input required :label="__('Email Address')" wire:model.blur='email' name="email" type="email" />
                    <x-input required :label="__('Password')" wire:model.blur='password' name="password" type="password" />
                    <x-input required :label="__('Confirm Password')" wire:model.blur='passwordConfirmation' name="passwordConfirmation" type="password" />
                </div>

                <div class="mt-6">
                    <x-button type="submit" spinner="resetPassword" primary class="w-full" :label="__('Reset Password')" />
                </div>
            </form>
        </x-card>
    </div>
</div>
