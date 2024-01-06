@section('title', __('Confirm your password'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
            {{ __('Confirm your password') }}
        </h2>
        <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
            {{ __('Please confirm your password before continuing') }}
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="confirm">
                <div class="flex flex-col gap-4">
                    <x-input required :label="__('Password')" wire:model.blur='password' name="password"
                        type="password" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <div class="text-sm leading-5">
                        <a wire:navigate href="{{ route('password.request') }}"
                            class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <x-button type="submit" spinner="confirm" primary class="w-full" :label="__('Confirm password')" />
                </div>
            </form>
        </div>
    </div>
</div>
