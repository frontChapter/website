<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
    <title>@yield('title') - {{ __(config('app.name')) }}</title>
    @else
    <title>{{ __(config('app.name')) }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body @if(app()->getLocale() === 'fa') dir="rtl" @else dir="ltr" @endif
    class="font-vazir bg-gray-50 dark:bg-gray-800 dark:text-white">
    @yield('body')
    @livewireScripts
    @wireUiScripts
</body>
</html>
