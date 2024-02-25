@section('title', __('Server Error'))
<x-auth-layout>
    <img src="{{ asset('images/500.png') }}" class="w-48 h-48 mx-auto" alt="not-found">

    <h1 class="mt-12 text-3xl font-extrabold text-center">{{ __('500 | Server Error') }}</h1>

    <p class="mt-4 text-xl text-center">
        {{ __("An error has occurred, we will try to solve this problem soon.") }}
    </p>

    <x-button icon="arrow-right" primary class="mx-auto my-10" :label="__('Back To Home')" :href="route('home')" />
</x-auth-layout>
