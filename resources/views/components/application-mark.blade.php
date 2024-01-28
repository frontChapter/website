@if (app()->getLocale() === 'fa')
<img class="h-8 hidden dark:block" src="{{ asset('images/logo-horizontal-brand-light.png') }}" alt="Logo">
<img class="h-8 dark:hidden" src="{{ asset('images/logo-horizontal-brand-dark.png') }}" alt="Logo">
@else
<img class="h-8 hidden dark:block" src="{{ asset('images/logo-horizontal-brand-light-en.png') }}" alt="Logo">
<img class="h-8 dark:hidden" src="{{ asset('images/logo-horizontal-brand-dark-en.png') }}" alt="Logo">
@endif
