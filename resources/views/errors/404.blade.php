@section('title', __('Not Found'))
<x-auth-layout>
    <img src="{{ asset('images/404.png') }}" class="w-48 h-48 mx-auto" alt="not-found">

    <h1 class="mt-12 text-3xl font-extrabold text-center">{{ __('404 | Not Found') }}</h1>

    <p class="mt-4 text-xl text-center">
        {{ __("The page you are looking for does not exist.") }}
    </p>

    <x-button icon="arrow-right" primary class="mx-auto my-10" :label="__('Back To Home')" :href="route('home')" />
</x-auth-layout>
