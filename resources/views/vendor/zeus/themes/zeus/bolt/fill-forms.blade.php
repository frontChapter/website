@php
    $colors = \Illuminate\Support\Arr::toCssStyles([
        \Filament\Support\get_color_css_variables($zeusForm->options['primary_color'] ?? 'primary', shades: [50, 100, 200, 300, 400, 500, 600, 700, 800, 900]),
    ]);
@endphp

<div class="not-prose" style="{{ $colors }}">

    @if(!$inline)
        @if(!class_exists(\LaraZeus\BoltPro\BoltProServiceProvider::class) || (optional($zeusForm->options)['logo'] === null && optional($zeusForm->options)['cover'] === null))
            <x-slot name="header">
                <h2>{{ $zeusForm->name ?? '' }}</h2>
                <p class="my-2 text-gray-400 text-mdd">{{ $zeusForm->description ?? '' }}</p>

                @if($zeusForm->start_date !== null)
                    <div class="text-sm text-gray-400">
                        @svg('heroicon-o-calendar','h-4 w-4 inline-flex')
                        <span>{{ __('Available from') }}:</span>
                        <span>{{ optional($zeusForm->start_date)->format(\Filament\Infolists\Infolist::$defaultDateDisplayFormat) }}</span>,
                        <span>{{ __('to') }}:</span>
                        <span>{{ optional($zeusForm->end_date)->format(\Filament\Infolists\Infolist::$defaultDateDisplayFormat) }}</span>
                    </div>
                @endif
            </x-slot>
        @endif

        <x-slot name="breadcrumbs">
            @if($zeusForm->extensions === null)
                <li class="flex items-center">
                    <a href="{{ route('bolt.forms.list') }}">{{ __('Forms') }}</a>
                    @svg('iconpark-rightsmall-o','fill-current w-4 h-4 mx-3 rtl:rotate-180')
                </li>
            @else
                <li class="flex items-center">
                    <a href="{{ \LaraZeus\Bolt\Facades\Extensions::init($zeusForm, 'route') }}">{{ \LaraZeus\Bolt\Facades\Extensions::init($zeusForm, 'label') }}</a>
                    @svg('iconpark-rightsmall-o','fill-current w-4 h-4 mx-3 rtl:rotate-180')
                </li>
            @endif
            <li class="flex items-center">
                {{ $zeusForm->name }}
            </li>
        </x-slot>
    @endif

    @if(!$inline)
        @include($boltTheme.'.loading')
    @endif

    @if(class_exists(\LaraZeus\BoltPro\BoltProServiceProvider::class) && optional($zeusForm->options)['logo'] !== null && optional($zeusForm)->options['cover'] !== null)
        <div style="background-image: url('{{ \Illuminate\Support\Facades\Storage::disk(config('zeus-bolt.uploadDisk'))->url($zeusForm->options['cover']) }}')"
             class="flex items-center justify-start gap-4 px-4 py-6 bg-center bg-cover rounded-lg bg-clip-border bg-origin-border">
            <div>
                <img
                    class="object-cover bg-white rounded-full shadow-md shadow-custom-100 sm:w-24"
                    src="{{ \Illuminate\Support\Facades\Storage::disk(config('zeus-bolt.uploadDisk'))->url($zeusForm->options['logo']) }}"
                    alt="logo"
                />
            </div>
            <div class="w-full p-4 space-y-1 text-left rounded-lg bg-white/40">
                <h4 class="text-2xl font-bold text-custom-600 dark:text-white">
                    {{ $zeusForm->name ?? '' }}
                </h4>
                @if(filled($zeusForm->description))
                    <h5 class="font-normal text-custom-600">
                        {{ $zeusForm->description ?? '' }}
                    </h5>
                @endif
                @if($zeusForm->start_date !== null)
                    <div class="flex items-center justify-start gap-2 text-sm text-custom-800">
                        @svg('heroicon-o-calendar','h-5 w-5 inline-flex')
                        <span class="flex items-center justify-center gap-1">
                            <span>{{ __('Available from') }}:</span>
                            <span>{{ optional($zeusForm->start_date)->format(\Filament\Infolists\Infolist::$defaultDateDisplayFormat) }}</span>,
                            <span>{{ __('to') }}:</span>
                            <span>{{ optional($zeusForm->end_date)->format(\Filament\Infolists\Infolist::$defaultDateDisplayFormat) }}</span>
                        </span>
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if($sent)
        @include($boltTheme.'.submitted')
    @else
        <x-filament-panels::form wire:submit.prevent="store" :class="!$inline ? 'mx-2' : ''">
            @if(!$inline)
                {{ \LaraZeus\Bolt\Facades\Bolt::renderHookBlade('zeus-form.before') }}
            @endif

            {!! \LaraZeus\Bolt\Facades\Extensions::init($zeusForm, 'render',$extensionData) !!}

            @if(!empty($zeusForm->details))
                <div class="m-4">
                    <x-filament::section :compact="true">
                        {!! nl2br($zeusForm->details) !!}
                    </x-filament::section>
                </div>
            @endif

            {{ $this->form }}

            <div class="px-4 py-2 text-center">
                <x-filament::button type="submit" :color="$zeusForm->options['primary_color'] ?? 'primary'">
                    {{ __('Save') }}
                </x-filament::button>
            </div>

            @if(!$inline)
                {{ \LaraZeus\Bolt\Facades\Bolt::renderHookBlade('zeus-form.after') }}
            @endif
        </x-filament-panels::form>
    @endif
</div>
