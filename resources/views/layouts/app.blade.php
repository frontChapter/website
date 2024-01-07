@extends('layouts.base')

@section('body')
<x-banner />

<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.template.header')

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
