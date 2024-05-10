<div>
    <div class="max-w-4xl px-4 mx-auto">
        <x-filament::section>
            @if(!empty($zeusForm->options['confirmation-message']))
                <span class="text-gray-600 text-md">
                    {!! $zeusForm->options['confirmation-message'] !!}
                </span>
            @else
                <span class="text-gray-600 text-md">
                    {{ __('the form') }}
                    <span class="font-semibold">{{ $zeusForm->name ?? '' }}</span>
                    {{ __('submitted successfully') }}.
                </span>
            @endif

            {!! \LaraZeus\Bolt\Facades\Extensions::init($zeusForm, 'SubmittedRender', ['extensionData' => $extensionData['extInfo']['itemId'] ?? 0]) !!}

        </x-filament::section>
    </div>
</div>
