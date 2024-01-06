@use('App\Enums\SexEnum')
@php
    $state['birth_date'] = verta($state['birth_date'])->formatJalaliDate();
@endphp
<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="object-cover w-20 h-20 rounded-full">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-button>

                @if ($this->user->profile_photo_path)
                    <x-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <div class="col-span-6 sm:col-span-4">
            <x-input :label="__('First name')" required wire:model.blur='state.first_name' name="first_name" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-input :label="__('Last name')" required wire:model.blur='state.last_name' name="last_name" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-input :label="__('User name')" required wire:model.blur='state.username' name="username" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-input dir="ltr" class="rtl:text-right ltr:text-left" placeholder="####/##/##" :label="__('Birth date')" wire:model.blur='state.birth_date' name="birth_date" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-select :label="__('Sex')" wire:model.defer="state.sex" name="sex" :clearable="false" :flip-options="true">
                @foreach (SexEnum::cases() as $case)
                <x-select.option :label="$case->label()" :value="$case->value" />
                @endforeach
            </x-select>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-input :label="__('Email')" required wire:model.blur='state.email' name="email" type="email" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="mt-2 text-sm dark:text-white">
                    {{ __('Your email address is unverified.') }}

                    <x-button flat xs primary spinner="sendEmailVerification" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </x-button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        <hr class="col-span-6 border-t sm:col-span-4">
        <div class="col-span-6 sm:col-span-4">
            <x-textarea :label="__('Bio')" wire:model.blur="state.bio" name="bio" :placeholder="__('Write a little about yourself')" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-input :label="__('Job title')" wire:model.blur='state.job_title' name="job_title" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button primary type="submit" :label="__('Save')" spinner="updateProfileInformation" wire:loading.attr="disabled" wire:target="photo" />
    </x-slot>
</x-form-section>
