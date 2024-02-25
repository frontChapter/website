@section('title', __('Forbidden'))
<x-auth-layout>
    <img src="{{ asset('images/403.jpg') }}"
        class="mx-auto shadow-xl shadow-gray-500 rounded-xl w-96 h-96 md:w-[38rem] md:h-[38rem]" alt="not-found">

    <h1 class="mt-12 text-3xl font-extrabold text-center">{{ __('403 | Forbidden') }}</h1>

    <p class="mt-4 text-xl text-center" dir="ltr">
        You Shall Not Pass!
    </p>

    <x-button icon="arrow-right" primary class="mx-auto my-10" :label="__('Back To Home')" :href="route('home')" />
</x-auth-layout>
