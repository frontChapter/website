@extends('layouts.base')

@section('body')
    <div class="flex flex-col justify-center min-h-screen p-2 py-12 sm:px-6 lg:px-8">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
