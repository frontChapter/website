@use('App\Enums\AttributeTypeEum')

<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Manage Additional Data') }}
    </h2>
</x-slot>
<x-slot name="headerAction">
    <x-header.profile-links />
</x-slot>

<div class="container px-4 py-10 mx-auto sm:px-2 md:px-00">
    <x-form-section submit="updateProfileInformation">
        <x-slot name="title">
            {{ __('Additional Data') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update your account\'s additional data information.') }}
        </x-slot>

        <x-slot name="form">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flex items-end col-span-6 gap-2">
                <h4 class="py-2 text-gray-900 me-4">{{ __('New') }}:</h4>
                <x-select :placeholder="__('Additional Data')" wire:model.blur="type" name="type" :clearable="false"
                    :flip-options="true">
                    @foreach (AttributeTypeEum::cases() as $case)
                    <x-select.option :label="$case->label()" :value="$case->value" />
                    @endforeach
                </x-select>
                <div>
                    <x-button wire:click='add' spinner='add' :label="__('Add')" />
                </div>
            </div>
            <hr class="w-full col-span-6">

            <div class="flex flex-col col-span-6 gap-2">
                @foreach ($forms as $index => $form)
                <div class="flex items-end gap-2">
                    @if($form['typeInstance']->inputType() === 'input.url')
                    <x-input :label="__('Title :name', ['name' => $form['typeInstance']->label()])"
                        wire:model.blur='forms.{{ $index }}.value' name="forms.{{ $index }}.value" type="url" />
                    @elseif($form['typeInstance']->inputType() === 'input.text')
                    <x-input :label="__('Title :name', ['name' => $form['typeInstance']->label()])"
                        wire:model.blur='forms.{{ $index }}.value' name="forms.{{ $index }}.value" />
                    @elseif($form['typeInstance']->inputType() === 'textarea')
                    <div class="w-full">
                        <x-textarea :label="__('Bio')" wire:model.blur="forms.{{ $index }}.value"
                            name="forms.{{ $index }}.value" />
                    </div>
                    @endif
                    <div>
                        <x-button primary wire:click="save({{ $index }})" type="button" :label="__('Save')"
                            spinner="save({{ $index }})" wire:loading.attr="disabled"
                            wire:target="save({{ $index }})" />
                    </div>
                </div>
                @endforeach
            </div>
            <div class="flex flex-col col-span-6 gap-2 mb-4">
                @foreach ($attributes as $attribute)
                <div wire:key='$attribute->id' class="flex items-center gap-2">
                    <p class="my-2 font-medium w-28 me-2 min-w-max">{{ $attribute->type->label() }}:</p>
                    <div class="flex w-full gap-2 p-2 border rounded-lg">
                        @svg($attribute->type->iconName(), 'w-6 h-6 m-2')
                        <div class="w-full py-2">
                            {!! $attribute->type->htmlValue($attribute->value) !!}
                        </div>
                        <div class="min-w-max">
                            <x-button.circle flat class="ms-auto" negative icon="trash"
                                spinner="delete({{ $attribute->id }})" wire:click="delete({{ $attribute->id }})" />
                        </div>
                    </div>
                </div>
                @endforeach
        </x-slot>
    </x-form-section>
</div>
