@php
    $links = [];

    $links[] = [
        'label' => __('Home'),
        'url' => route('home'),
        'isActive' => request()->routeIs('home'),
    ];

    if(auth()->check()){
        $links[] = [
            'label' => __('My tickets'),
            'url' => route('ticket'),
            'isActive' => request()->routeIs('ticket'),
        ];
    }
@endphp
<div>
    <x-navigation-menu :$links />

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white shadow dark:bg-gray-800">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif

    <x-check-email-verified />
</div>
