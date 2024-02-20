@section('title', __('Sign in to your account'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center">
            {{ __('Sign in to your account') }}
        </h2>
        @if (Route::has('register'))
        <p class="mt-2 text-sm leading-5 text-center text-secondary-600 dark:text-secondary-400 max-w">
            {{ __('Or') }}
            <a wire:navigate href="{{ empty($redirect) ? route('register') : route('register', ['redirect' => $redirect]) }}"
                class="font-medium transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                {{ __('create a new account') }}
            </a>
        </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card>
            <form wire:submit.prevent="authenticate">
                <div class="flex flex-col gap-4">
                    <x-input required :label="__('User name Or Email')" wire:model.blur='usernameOrEmail' name="usernameOrEmail" />
                    <x-input required :label="__('Password')" wire:model.blur='password' name="password" type="password" />
                </div>
                <div class="flex items-center justify-between mt-6">
                    <x-checkbox :label="__('Remember me')" name="remember" wire:model.lazy="remember" id="remember"/>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}"
                            class="font-medium transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <x-button type="submit" spinner="authenticate" primary class="w-full" :label="__('Login')" icon="lock-open" />
                </div>
            </form>
        </x-card>
    </div>
</div>
