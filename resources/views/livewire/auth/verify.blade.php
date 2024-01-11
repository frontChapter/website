@section('title', __('Verify your email address'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-primary-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center">
            {{ __('Verify your email address') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card>
            @if (session('resent'))
                <x-alert class="mb-4" type="success" icon="check-circle" :description="__('A fresh verification link has been sent to your email address.')" />
            @endif

            <div class="text-sm">
                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>

                <p class="mt-3">
                    {{ __('If you did not receive the email,') }} <x-button flat primary xs wire:click="resend" spinner="resend">{{ __('click here to request another') }}</x-button>
                </p>
            </div>
        </x-card>

        <div class="flex w-full">
            <x-button class="mx-auto mt-2" sm flat light :href="route('home')" :label="__('Back To Home')" icon="arrow-right" />
        </div>
    </div>
</div>
