@extends('layouts.auth')
@section('title', __('Server Error'))
@section('content')
    <img src="{{ asset('images/500.png') }}" class="mx-auto" class="w-48 h-48" alt="not-found">

    <h1 class="text-center mt-12 text-3xl font-semibold">500 {{ __('Server Error') }}</h1>

    <p class="mt-2 text-center">
        {{ __("An error has occurred, we will try to solve this problem soon.") }}
    </p>

    <x-button primary class="mx-auto my-10" :label="__('Back To Home')" :href="route('home')" /></div>
@endsection
