<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
    <title>@yield('title') | {{ __(config('app.name')) }}</title>
    @else
    <title>{{ __(config('app.name')) }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <link rel="stylesheet" href="{{ asset('css/dana-web-font.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @wireUiScripts
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body @if(app()->getLocale() === 'fa') dir="rtl" @else dir="ltr" @endif
    class="relative font-dana bg-secondary-50 dark:bg-secondary-900 dark:text-secondary-300">
    @yield('body')
    <x-notifications z-index="z-50" position="bottom-left" />

</body>
</html>
