<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card class="md:py-20">
                <x-logo class="w-48 h-48 mx-auto mb-6" />
                <p class="text-center w-100 text-4xl font-black">{{ __('FrontChapter') }}</p>
            </x-card>
        </div>
    </div>
</x-app-layout>
