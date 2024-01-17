@auth
<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
        {{ __('Home') }}
    </h2>
</x-slot>
@endauth

<div class="container mx-auto my-8">
    <div class="flex flex-col gap-y-4">
        @guest
        <x-card class="md:py-20">
            <x-logo class="w-48 h-48 mx-auto mb-6" />
            <p class="text-4xl font-black text-center w-100">{{ __('FrontChapter') }}</p>
        </x-card>
        @endguest
        @auth
        @if(!empty(env('EVAND_SLUG')))
        <div class="flex flex-col gap-4 py-4 text-center xl:py-8">
            <h2 class="text-4xl font-black leading-normal animate-text-recolor md:text-5xl xl:text-6xl xl:leading-relaxed">{{ __('Registration in the second Front Chapter conference') }}</h2>
            <p class="text-xl">{{ __('February 2024') }} - {{ __('Mazandaran, Babolsar') }}</p>
        </div>
        <div class="evand-widget evand-widget-event-registration" data-event-slug="{{ env('EVAND_SLUG') }}"
        data-setting="">
        </div>
        @endif
        @endauth
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
