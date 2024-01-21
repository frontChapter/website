@extends('layouts.auth')

<div class="container h-screen mx-auto">
    <div class="flex flex-col items-center justify-center h-full gap-y-4">
            <x-logo class="w-48 h-48 mx-auto mb-6" />
            @guest
            <div class="flex items-center gap-2 mt-4">
                <x-button light wire:navigate :href="route('login')" :label="__('Login')" />
                <x-button icon="user-add" primary wire:navigate :href="route('register')" :label="__('Register')" />
            </div>
            @else
            <div class="flex items-center gap-2 mt-4">
                <x-button icon="user" primary wire:navigate :href="route('profile', [auth()->user()])" :label="__('Enter To Account')" />
            </div>
            @endguest
    </div>
</div>
