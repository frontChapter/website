@auth
@empty (auth()->user()->email_verified_at)
<div class="container max-w-3xl mx-auto mt-5">
    <x-alert icon="exclamation-triangle" type="warning" :title="__('Verify Your Email Address')"
        :description="__('Before proceeding, please check your email for a verification link.')">
        <x-slot name="actions">
            <x-button warning :href="route('verification.notice')" :label="__('Verify Email Address')" />
        </x-slot>
    </x-alert>
</div>
@endif
@endauth
