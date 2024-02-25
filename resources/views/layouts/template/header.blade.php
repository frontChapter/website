@php
$links = [];

$links[] = [
'label' => __('Front Chapter 2024'),
'url' => route('conf1402'),
'isActive' => request()->routeIs('conf1402'),
'blinkBdge' => true,
];

$links[] = [
'label' => __('I am a HERO Festival'),
'url' => route('festival-site'),
'isActive' => request()->routeIs('festival-site'),
'blinkBdge' => true,
];
@endphp
<x-check-email-verified />
<x-navigation-menu :$links />

<!-- Page Heading -->
@if (isset($header))
<header class="bg-white shadow dark:bg-secondary-800">
    <div class="container flex items-stretch gap-2 px-4 mx-auto sm:px-2 md:px-0">
        <div class="py-6">
            @section('title', strip_tags($header))
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

<livewire:campaign.utm-campaign />
