@extends('layouts.auth')
@section('title', __('Server Error'))

    <div class="flex flex-col items-center justify-center h-screen sm:mx-auto sm:w-full sm:max-w-md">
        <img src="{{ asset('images/500.png') }}" class="mx-auto" class="w-48 h-48" alt="not-found">

        <h1 class="mt-12 text-3xl font-semibold">500 {{ __('Server Error') }}!</h1>

        <p class="mt-2 text-center">
            {{ __("An error has occurred, we will try to solve this problem soon.") }}
        </p>

        <x-button primary class="my-10" :label="__('Back To Home')" :href="route('home')" />
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <x-card>
            <form wire:submit.prevent="authenticate">


                <div class="mt-6">
                    <x-button type="submit" spinner="authenticate" primary class="w-full" :label="__('Login')"
                        icon="lock-open" />
                </div>
            </form>
        </x-card>
    </div>
</div>
