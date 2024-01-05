@extends('layouts.base')

@section('body')
<x-banner />

<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @auth()
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white shadow dark:bg-gray-800">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif
    @endauth
    <!-- Page Content -->
    <main>
        @isset ($slot)
        {{ $slot }}
        @endisset
        @yield('content')
    </main>
</div>

@stack('modals')
@endsection
