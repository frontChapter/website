<div>
    <x-slot name="header">
        <h2>{{ __('Date Not Available') }}</h2>
    </x-slot>

    <div class="max-w-4xl px-4 mx-auto">
        <x-filament::section :compact="true">
            <x-slot name="heading">
                <div class="flex items-center justify-center gap-2">
                    @svg('heroicon-o-exclamation-triangle', 'w-5 h-5 text-primary-600')
                    <span class="text-md">
                        {{ __('Date Not Available') }}
                    </span>
                </div>
            </x-slot>
            <p>
                {{ __('the form') }}
                <span class="font-semibold">{{ $zeusForm->name ?? '' }}</span>
                {{ __('is not available for submission') }}.
            </p>

            <div class="flex flex-wrap items-center justify-between mt-2">
                <p class="flex-fill text-start lg:w-1/2">
                    <span class="text-sm text-gray-500">{{ __('Start date') }}</span>:
                    <span class="text-sm">
                        @if (app()->getLocale() === 'fa')
                            {{ $zeusForm->start_date->toJalali()->format('Y/m/d H:i:s') }}
                        @else
                            {{ $zeusForm->start_date->format(\Filament\Infolists\Infolist::$defaultDateTimeDisplayFormat) }}
                        @endif
                    </span>
                </p>
                <p class="flex-fill text-start lg:w-1/2">
                    <span class="text-sm text-gray-500">{{ __('End date') }}</span>:
                    <span class="text-sm">
                        @if (app()->getLocale() === 'fa')
                            {{ $zeusForm->end_date->toJalali()->format('Y/m/d H:i:s') }}
                        @else
                            {{ $zeusForm->end_date->format(\Filament\Infolists\Infolist::$defaultDateTimeDisplayFormat) }}
                        @endif
                    </span>
                </p>
            </div>
        </x-filament::section>
    </div>
</div>
