@section('title', __('Sign in to your account'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
            {{ __('Sign in to your account') }}
        </h2>
        @if (Route::has('register'))
        <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
            {{ __('Or') }}
            <a wire:navigate href="{{ route('register') }}"
                class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                {{ __('create a new account') }}
            </a>
        </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate">
                <div class="flex flex-col gap-4">
                    <x-input required :label="__('User name Or Email')" wire:model.blur='usernameOrEmail' />
                    <x-input required :label="__('Password')" wire:model.blur='password' type="password" />
                </div>
                <div class="flex items-center justify-between mt-6">
                    <x-checkbox :label="__('Remember me')"  wire:model.lazy="remember" id="remember"/>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}"
                            class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <x-button type="submit" spinner="authenticate" primary class="w-full" :label="__('Login')" icon="lock-open" />
                </div>
            </form>
        </div>
    </div>
</div>
