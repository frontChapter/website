@use('App\Enums\AttributeTypeEnum')
<x-profile-layout>
    <x-slot name="title">
        <h1 class="text-3xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
            {{ __('Edit Additional Data') }}
        </h1>
    </x-slot>

    <x-form-section submit="save">
        <x-slot name="title">
            {{ __('Additional Data') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your account\'s additional data information.') }}
        </x-slot>

        <x-slot name="form">
            <div class="flex flex-col col-span-6 gap-2">
                @foreach (AttributeTypeEnum::cases() as $case)
                @if($case->inputType() === 'input.url')
                <div class="w-full mb-2">
                    <x-input dir="ltr" :label="$case->getLabel()" wire:model.blur='forms.{{ $case->value }}.value'
                        name="forms.{{ $case->value }}.value" type="url" />
                </div>
                @elseif($case->inputType() === 'input.text')
                <div class="w-full mb-2">
                    <x-input :label="$case->getLabel()" wire:model.blur='forms.{{ $case->value }}.value'
                        name="forms.{{ $case->value }}.value" />
                </div>
                @elseif($case->inputType() === 'textarea')
                <div class="w-full mb-2">
                    <x-textarea :label="$case->getLabel()" wire:model.blur="forms.{{ $case->value }}.value"
                        name="forms.{{ $case->value }}.value" />
                </div>
                @endif
                @endforeach
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-button primary type="submit" :label="__('Save')" spinner="save" />

            <x-action-message class="ms-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
        </x-slot>
    </x-form-section>
</x-profile-layout>
