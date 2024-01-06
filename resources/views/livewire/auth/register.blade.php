@section('title', __('Create a new account'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
            {{ __('Create a new account') }}
        </h2>

        <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
            {{ __('Or') }}
            <a href="{{ route('login') }}" wire:navigate class="font-medium transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                {{ __('sign in to your account') }}
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div class="flex flex-col gap-4">
                    <x-input required :label="__('First name')" wire:model.blur='firstName' />
                    <x-input required :label="__('Last name')" wire:model.blur='lastName' />
                    <x-input required :label="__('User name')" wire:model.blur='username' />
                    <x-input required :label="__('Email')" wire:model.blur='email' type="email" />
                    <x-input required :label="__('Password')" wire:model.blur='password' type="password" />
                    <x-input required :label="__('Password confirmation')" wire:model.blur='passwordConfirmation' type="password" />
                </div>

                <div class="mt-6">
                    <x-button type="submit" spinner="register" primary class="w-full" :label="__('Register')" icon="user-add" />
                </div>
            </form>
        </div>
    </div>
</div>
