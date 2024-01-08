@section('title', __('Reset Password'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center ">
            {{ __('Reset Password') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card>
            @if ($emailSentMessage)
            <div class="p-4 rounded-md bg-green-50 dark:bg-green-950">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-400 dark:text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div class="ms-3">
                        <p class="text-sm font-medium leading-5 text-green-800 dark:text-green-200">
                            {{ $emailSentMessage }}
                        </p>
                    </div>
                </div>
            </div>
            @else
            <form wire:submit.prevent="sendResetPasswordLink">
                <div class="flex flex-col gap-4">
                    <x-input required :label="__('Email Address')" wire:model.blur='email' name="email" type="email" />
                </div>

                <div class="mt-6">
                    <x-button type="submit" spinner="sendResetPasswordLink" primary class="w-full"
                        :label="__('Send Password Reset Link')" />
                </div>
            </form>
            @endif
        </x-card>
    </div>
</div>
