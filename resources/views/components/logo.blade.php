@if (app()->getLocale() === 'fa')
<img {{ $attributes->merge(['class' => 'hidden dark:block']) }} src="{{ asset('images/logo-vertical-brand-light.png') }}" alt="Logo">
<img {{ $attributes->merge(['class' => 'dark:hidden']) }} src="{{ asset('images/logo-vertical-brand-dark.png') }}" alt="Logo">
@else
<img {{ $attributes->merge(['class' => 'hidden dark:block']) }} src="{{ asset('images/logo-vertical-brand-light-en.png') }}" alt="Logo">
<img {{ $attributes->merge(['class' => 'dark:hidden']) }} src="{{ asset('images/logo-vertical-brand-dark-en.png') }}" alt="Logo">
@endif
