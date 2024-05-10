@extends('layouts.base')

@section('body')
    <x-banner />

    <div class="min-h-screen bg-secondary-100 dark:bg-secondary-900">
        @include('layouts.template.header')

        <!-- Page Content -->
        <main class="p-2">
            <div class="container mx-auto my-8">
                @isset($slot)
                    {{ $slot }}
                @endisset
                @yield('content')
            </div>
        </main>
    </div>

    @stack('modals')
@endsection

@auth
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
            {{ __('Front Chapter 2024') }}
        </h2>
        @if (isset($breadcrumbs))
            <nav aria-label="Breadcrumb" class="my-1 font-bold text-gray-400">
                <ol class="inline-flex p-0 list-none">
                    {{ $breadcrumbs }}
                </ol>
            </nav>
        @endif
        @if (isset($header))
            <div class="text-xl italic font-semibold text-gray-600 dark:text-gray-100">
                {{ $header }}
            </div>
        @endif
    </x-slot>
@endauth

@prepend('styles')
    @filamentStyles
@endprepend

@prepend('scripts')
    @filamentScripts
@endprepend
