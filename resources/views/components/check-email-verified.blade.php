@auth
@empty (auth()->user()->email_verified_at)
<div class="py-4 bg-warning-50 text-warning-900 dark:bg-warning-500/20 dark:text-warning-200">
    <div class="container px-4 mx-auto sm:px-2 md:px-0">
        <div class="flex items-center gap-4">
            @svg("heroicon-s-exclamation-triangle", 'min-w-6 w-6 h-6 text-warning-500 dark:text-warning-300')
            <div class="flex flex-col">
                <p class="text-base font-medium sm:hidden">{{ __('Verify Your Email Address') }}</p>
                <p class="hidden sm:block">
                    @yield('check_email_verification_description', __('Before proceeding, please check your email for a verification link.'))
                </p>
            </div>
            <div class="ms-auto min-w-max">
                <x-button warning :href="route('verification.notice')" :label="__('Verify Email')" />
            </div>
        </div>
    </div>
</div>
@endempty
@endauth
