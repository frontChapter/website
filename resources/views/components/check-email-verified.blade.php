@auth
@empty (auth()->user()->email_verified_at)

<div class="container px-2 mx-auto mt-5 md:max-w-3xl">
    <x-alert icon="exclamation-triangle" type="warning" :title="__('Verify Your Email Address')">
        <x-slot:actions>
            <x-button warning :href="route('verification.notice')" :label="__('Verify Email Address')" />
        </x-slot>
        @yield('check_email_verification_description', __('Before proceeding, please check your email for a verification link.'))
    </x-alert>
</div>

@endif
@endauth
