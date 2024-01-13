@auth
@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
<div class="container px-2 mx-auto mt-5 md:max-w-3xl">
    <x-alert icon="exclamation-triangle" type="warning" :title="__('Verify Your Email Address')"
        :description="__('Before proceeding, please check your email for a verification link.')">
        <x-slot name="actions">
            <x-button warning :href="route('verification.notice')" :label="__('Verify Email Address')" />
        </x-slot>
    </x-alert>
</div>
@endif
@endauth
