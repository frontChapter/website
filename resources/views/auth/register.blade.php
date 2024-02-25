@section('title', __('Create a new account'))

<x-auth-layout>
<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center">
            {{ __('Create a new account') }}
        </h2>

        <p class="mt-2 text-sm leading-5 text-center text-secondary-600 dark:text-secondary-400 max-w">
            {{ __('Or') }}
            <a href="{{ empty($redirect) ? route('login') : route('login', ['redirect' => $redirect]) }}" wire:navigate
                class="font-medium transition duration-150 ease-in-out text-primary-600 hover:text-primary-500 focus:outline-none focus:underline">
                {{ __('sign in to your account') }}
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="flex flex-col gap-4">
                    <x-input required autofocus autocomplete :label="__('First name')" name="first_name"
                        :value="old('first_name')" />
                    <x-input required autocomplete :label="__('Last name')" name="last_name"
                        :value="old('last_name')" />

                    <x-input required autocomplete :label="__('User name')" name="username" :value="old('username')" />

                    <x-input required autocomplete :label="__('Email')" name="email" :value="old('email')" />

                    <x-input required :label="__('Password')" name="password" type="password" />
                    <x-input required :label="__('Password confirmation')" name="password_confirmation"
                        type="password" />

                    {{-- <x-honeypot livewire-model="extraFields" /> --}}
                    <x-honey recaptcha="register" />

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                        class="text-sm underline rounded-md text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-secondary-800">'.__('Terms
                                        of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                        class="text-sm underline rounded-md text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-secondary-800">'.__('Privacy
                                        Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                    @endif
                </div>

                <div class="mt-6">
                    <x-button type="submit" primary class="w-full" :label="__('Register')" icon="user-add" />
                </div>
            </form>
        </x-card>
    </div>
</div>
</x-auth-layout>
