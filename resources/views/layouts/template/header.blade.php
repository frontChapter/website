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
        <div class="container flex items-stretch gap-2 px-4 mx-auto sm:px-2 md:px-0">
            <div class="py-6">
                {{ $header }}
            </div>
            @if (isset($headerAction))
            <div class="flex ms-auto">
                {{ $headerAction }}
            </div>
            @endif
        </div>
    </header>
    @endif

    <x-check-email-verified />
</div>
