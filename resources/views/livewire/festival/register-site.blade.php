<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
        {{ __('Register In Festival') }}
    </h2>
</x-slot>

<div class="container h-full max-w-3xl mx-auto my-8 lg:my-28">
    <div class="flex flex-col gap-y-4">
        <h3 class="m-2 text-2xl font-medium text-center">{{ __('Complete the information below') }}:</h3>
        @if ($level === 2)
        <form class="flex flex-col gap-4" wire:submit="submit">
            <x-card>
                <div class="flex justify-between">
                    <p>{{ __('Application ID') }}:</p>
                    <div class="flex gap-2">
                        <p class="px-1 py-0.5 font-mono rounded-sm bg-gray-100 dark:bg-secondary-900">fcf1402-{{ $appId }}</p>
                        <x-button.circle xs spinner="level" wire:click="$set('level', 1)" icon="pencil" class="ms-auto"
                            green type="button" />
                    </div>
                </div>
            </x-card>
            <x-card>
                <div x-data="{photoName: null, photoPreview: null}"
                    class="flex items-center justify-between gap-2 h-14">
                    <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo" x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);
                        " />

                    <div class="flex items-center gap-2">
                        <x-button type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Select Site Logo') }}
                        </x-button>
                        <x-input-error for="photo" class="mt-2" />
                        <div wire:loading wire:target="photo">{{ __('Uploading') }}...</div>
                    </div>

                    <div x-show="photoPreview" style="display: none;">
                        <span class="block bg-center bg-no-repeat bg-cover rounded-sm w-14 h-14"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>
                </div>
            </x-card>
            <x-card>
                <div class="flex flex-col gap-4">
                    <x-input wire:model.blur="name" :placeholder="__('My Portfolio Site')" :label="__('Site Title')" />
                    <x-input wire:model.blur="url" placeholder="https://example.com" :label="__('Site Address')" />

                    <x-alert icon="information-circle" :description="__('The site address you enter must be active and accessable')" />
                </div>
            </x-card>
            <x-button spinner="submit" icon="check-circle" primary type="submit"
                :label="__('Register Site')" />
        </form>
        @else
        <form class="flex flex-col gap-4" wire:submit="validateApplication">
            <x-card>
                <x-input dir="ltr" class="!pl-[5.5rem] tracking-wider" wire:model.blur="appId" placeholder="mysite"
                    :label="__('Your Liara Application Id')">
                    <x-slot:prepend>
                        <div dir="ltr"
                            class="absolute inset-y-0 left-0 flex items-center gap-1 px-2 border-e border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600">
                            <span>fcf1402</span>
                            <span>-</span>
                        </div>
                    </x-slot:prepend>
                </x-input>
            </x-card>
            <x-button spinner="validateApplication" :icon="app()->getLocale() === 'fa' ? 'arrow-left' : 'arrow-right'"
                primary type="submit" :label="__('Continue')" />
        </form>
        @endif
    </div>
</div>
