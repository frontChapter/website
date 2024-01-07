<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-8">
        <div class="flex flex-col gap-y-4">
            {{-- <x-card class="md:py-20">
                <x-logo class="w-48 h-48 mx-auto mb-6" />
                <p class="text-4xl font-black text-center w-100">{{ __('FrontChapter') }}</p>
            </x-card> --}}
            @if(!empty(env('EVAND_SLUG')))
            <div class="evand-widget evand-widget-event-registration" data-event-slug="{{ env('EVAND_SLUG') }}" data-setting="">
                <script>
                    (function(){if(!document.getElementById('evand-widget-event-registration')){var t=document.createElement("script");t.type="text/javascript";t.async=!0;t.src=("https:"==document.location.protocol?"https://":"http://")+"widgets.evand.com/event-registration.js?load=1";t.setAttribute('id','evand-widget-event-registration');var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e);}})();
                </script>
            </div>
            @endif
        </div>
    </div>

</x-app-layout>
