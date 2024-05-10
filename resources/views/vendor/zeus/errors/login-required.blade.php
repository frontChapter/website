<div>
    <x-slot name="header">
        <h2>{{ __('Login Required') }}</h2>
    </x-slot>

    <div class="max-w-4xl px-4 mx-auto">
        <x-filament::section :compact="true">
            <x-slot name="heading">
                <div class="flex items-center gap-2">
                    @svg('heroicon-o-exclamation-triangle','w-5 h-5 text-primary-600')
                    <span class="text-md">
                        {{ __('Login Required') }}
                    </span>
                </div>
            </x-slot>
            <div class="flex flex-wrap items-center justify-between">
                <p>
                    {{ __('Login is required to access the form') }}
                    <span class="font-semibold">{{ $zeusForm->name ?? '' }}</span>.
                </p>

                <x-filament::button tag="a" size="sm" color="gray" href="{{ route('login') }}">
                    {{ __('Login', ['redirect' => $zeusForm->slug_url]) }}
                </x-filament::button>
            </div>
        </x-filament::section>
    </div>
</div>
