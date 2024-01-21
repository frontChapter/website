@use('App\Enums\AttributeTypeEnum')

<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
        {{ __('Profile') }} {{ $user->name }}
    </h2>
</x-slot>

<div class="container mx-auto my-8">
    <div class="grid grid-cols-12 gap-x-4">
        <div class="col-span-12 xl:col-span-4">
            <x-card cardClasses="mt-8">
                <x-slot name="header">
                    <div class="relative flex gap-4 px-2 pt-4 pb-2 border-b dark:border-secondary-700 md:px-4">
                        <div class="z-40 -mt-12 w-28">
                            <x-avatar size="w-28 h-28 min-w-28" squared class="shadow-md"
                                src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                        </div>
                        <div class="flex flex-wrap justify-start w-full gap-4">
                            <div class="flex flex-col gap-1.5 me-auto">
                                <h4 class="text-2xl font-bold min-w-max">{{ $user->name }}</h4>
                                <div class="flex items-center gap-0.5 min-w-max">
                                    <p dir="ltr" class="h-4 leading-snug ltr:text-left rtl:text-right">
                                        {{ $user->username }}
                                    </p>
                                    <x-icon name="at-symbol" class="w-4 h-4" />
                                </div>
                            </div>
                            @if (auth()->id() === $user->id)
                            <div class="hidden sm:block min-w-max">
                                <x-button wire:navigate outline sm primary icon="pencil" :label="__('Edit Profile')"
                                    :href="route('profile.show')" />
                            </div>
                            <div class="block sm:hidden">
                                <x-button.circle wire:navigate outline sm primary icon="pencil"
                                    :href="route('profile.show')" />
                            </div>
                            @endif
                        </div>
                    </div>
                </x-slot>
                <div class="flex flex-col gap-2">
                    @if (isset($additionalAttributes[AttributeTypeEnum::Job->value]))
                    <div class="flex items-center gap-4">
                        <div class="flex gap-2 w-28 min-w-28">
                            <div class="min-w-max">
                                @svg($additionalAttributes[AttributeTypeEnum::Job->value]['icon'], 'w-6 h-6')
                            </div>
                            <p class="text-lg">{{ AttributeTypeEnum::Job->getLabel() }}</p>
                        </div>
                        {!! $additionalAttributes[AttributeTypeEnum::Job->value]['html'] !!}
                    </div>
                    @endif
                    @if (isset($additionalAttributes[AttributeTypeEnum::Company->value]))
                    <div class="flex items-center gap-4">
                        <div class="flex gap-2 w-28 min-w-28">
                            <div class="min-w-max">
                                @svg($additionalAttributes[AttributeTypeEnum::Company->value]['icon'], 'w-6 h-6')
                            </div>
                            <p class="text-lg">{{ AttributeTypeEnum::Company->getLabel() }}</p>
                        </div>
                        {!! $additionalAttributes[AttributeTypeEnum::Company->value]['html'] !!}
                    </div>
                    @endif
                    <div class="flex gap-4">
                        <div class="flex gap-2 w-28 min-w-28">
                            <x-heroicon-o-envelope class="w-6 h-6" />
                            <p class="text-lg">{{ __('Email') }}</p>
                        </div>
                        <a href="mailto:{{ $user->email }}" class="text-lg underline overflow-hidden text-ellipsis">{{ $user->email }}</a>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex gap-2 w-28 min-w-28">
                            <x-heroicon-o-user-circle class="w-6 h-6" />
                            <p class="text-lg">{{ __('Sex') }}</p>
                        </div>
                        <p class="text-lg">{{ $user->sex->getLabel() }}</p>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex gap-2 w-28 min-w-28">
                            <x-heroicon-o-briefcase class="w-6 h-6" />
                            <p class="text-lg">{{ __('Age') }}</p>
                        </div>
                        <p class="text-lg">{{ $user->age }}</p>
                    </div>
                </div>
            </x-card>
        </div>
        <div class="col-span-12 xl:col-span-8">
            <div class="flex flex-col gap-4 mt-8">
                <x-sad-carrot-complate-profile :show="auth()->id() === $user->id && !auth()->user()->isCompleted()" />
                    <x-card>
                    <x-slot name="title">
                        @svg($additionalAttributes[AttributeTypeEnum::Bio->value]['icon'], 'w-6 h-6 me-2 inline')
                        {{ __('Bio') }}
                    </x-slot>
                    @if (isset($additionalAttributes[AttributeTypeEnum::Bio->value]))
                    <p>
                        {{ $additionalAttributes[AttributeTypeEnum::Bio->value]['value'] }}
                    </p>
                    @else
                    <p>{{ __('Write a little about yourself') }}</p>
                    @endif
                </x-card>
                <x-card>
                    <x-slot name="title">
                        @svg('heroicon-o-link', 'w-6 h-6 me-2 inline')
                        {{ __('Links') }}
                    </x-slot>
                    <div class="flex flex-col gap-2">
                        @if( isset($additionalAttributes[AttributeTypeEnum::Link->value]) ||
                        isset($additionalAttributes[AttributeTypeEnum::Instagram->value]) ||
                        isset($additionalAttributes[AttributeTypeEnum::Linkedin->value]) ||
                        isset($additionalAttributes[AttributeTypeEnum::Resume->value]) )
                        @foreach ($additionalAttributes as $key => $attribute)
                        @if($key !== AttributeTypeEnum::Bio->value && $key !== AttributeTypeEnum::Job->value && $key !==
                        AttributeTypeEnum::Company->value)
                        <div class="flex items-center gap-4">
                            <div class="flex gap-2 w-28 min-w-28">
                                <div class="min-w-max">
                                    @svg($attribute['icon'], 'w-6 h-6')
                                </div>
                                <p class="text-lg">{{ $attribute['label'] }}</p>
                            </div>
                            {!! $attribute['html'] !!}
                        </div>
                        @endif
                        @endforeach
                        @else
                        <p>{{ __('Place for social links') }}</p>
                        @endif
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</div>
