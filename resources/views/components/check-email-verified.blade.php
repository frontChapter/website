@auth
@empty (auth()->user()->email_verified_at)
<div class="py-4 bg-warning-50 text-warning-900 dark:bg-secondary-800 dark:text-warning-200">
    <div class="container px-4 mx-auto sm:px-2 md:px-0">
        <div class="flex items-center gap-2">
            @svg("heroicon-s-exclamation-triangle", 'w-6 h-6 text-warning-300 dark:text-warning-300')
            <div class="flex flex-col">
                <p class="text-base font-medium sm:hidden">{{ __('Verify Your Email Address') }}</p>
                @yield('check_email_verification_description', __('Before proceeding, please check your email for a verification link.'))
            </div>
            <div class="ms-auto">
                <x-button warning :href="route('verification.notice')" :label="__('Verify Email Address')" />
            </div>
        </div>
    </div>
</div>
@endempty
@endauth
