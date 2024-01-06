@section('title', __('Verify your email address'))

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-lg">
        <a href="{{ route('home') }}">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
        </a>

        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
            {{ __('Verify your email address') }}
        </h2>

        <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
            {{ __('Or') }}
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                {{ __('Log Out') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            @if (session('resent'))
                <x-alert class="mb-4" type="primary" icon="check-circle" :description="__('A fresh verification link has been sent to your email address.')" />
            @endif

            <div class="text-sm text-gray-700">
                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>

                <p class="mt-3">
                    {{ __('If you did not receive the email,') }} <x-button flat primary xs wire:click="resend" spinner="resend">{{ __('click here to request another') }}</x-button>
                </p>
            </div>
        </div>
    </div>
</div>
