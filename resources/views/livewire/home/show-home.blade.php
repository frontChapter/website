@auth
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
        {{ __('Front Chapter 2024') }}
    </h2>
</x-slot>
@endauth

<div class="container mx-auto my-8">
    <div class="flex flex-col gap-y-4">
        {{-- @if(!empty(env('EVAND_SLUG')))
        <div class="flex flex-col gap-4 py-4 text-center xl:py-8">
            <h2 class="text-4xl font-black leading-normal animate-text-recolor md:text-5xl xl:text-6xl xl:leading-relaxed">{{ __('Registration in the second Front Chapter conference') }}</h2>
            <p class="text-xl">{{ __('29 February 2024') }} - {{ __('Mazandaran, Amol') }}</p>
        </div>
        @auth
        <div class="evand-widget evand-widget-event-registration" data-event-slug="{{ env('EVAND_SLUG') }}"
        data-setting="">
        @else
        <div class="max-w-3xl mx-auto">
            <x-alert icon="information-circle" :title="__('You must log in first to register for the conference.')">
                <x-slot:actions>
                    <div class="flex items-center gap-2">
                        <x-button light wire:navigate :href="route('login')" :label="__('Login')" />
                        <x-button icon="user-add" primary wire:navigate :href="route('register')" :label="__('Register')" />
                    </div>
                </x-slot:actions>
            </x-alert>
        </div>
        @endauth
        </div>
        @endif --}}

        <livewire:home.ticket-buyers lazy/>
    </div>
</div>


@script
<script>
    if(1){
            var t=document.createElement("script");
            t.type="text/javascript";
            t.async=!0;
            t.src=("https:"==document.location.protocol?"https://":"http://")+"widgets.evand.com/event-registration.js?load=1";
            t.setAttribute('id','evand-widget-event-registration');

            var e=document.getElementsByTagName("script")[0];
            e.parentNode.insertBefore(t,e);
    }
</script>
@endscript
