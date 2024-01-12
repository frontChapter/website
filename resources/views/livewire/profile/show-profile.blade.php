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
                    @foreach ($user->attributes()->whereIn('type', [AttributeTypeEnum::Job, AttributeTypeEnum::Company])->get() as $attribute)
                    <div class="flex items-center gap-4">
                        <div class="flex gap-2 w-28 min-w-28">
                            <div class="min-w-max">
                                @svg($attribute->type->iconName(), 'w-6 h-6')
                            </div>
                            <p class="text-lg">{{ $attribute->type->label() }}</p>
                        </div>
                        {!! $attribute->type->htmlValue($attribute->value) !!}
                    </div>
                    @endforeach
                    <div class="flex gap-4">
                        <div class="flex gap-2 w-28">
                            <x-heroicon-o-envelope class="w-6 h-6" />
                            <p class="text-lg">{{ __('Email') }}</p>
                        </div>
                        <a href="mailto:{{ $user->email }}" class="text-lg underline">{{ $user->email }}</a>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex gap-2 w-28">
                            <x-heroicon-o-user-circle class="w-6 h-6" />
                            <p class="text-lg">{{ __('Sex') }}</p>
                        </div>
                        <p class="text-lg">{{ $user->sex->label() }}</p>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex gap-2 w-28">
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
                <x-card :title="__('Bio')">
                    @forelse ($user->attributes()->whereType(AttributeTypeEnum::Bio)->get() as $attribute)
                    <p>{{ $attribute->value }}</p>
                    @empty
                    <p>{{ __('Write a little about yourself') }}</p>
                    @endforelse
                </x-card>
                <x-card :title="__('Links')">
                    <div class="flex flex-col gap-2">
                        @forelse ($user->attributes()->whereNotIn('type', [AttributeTypeEnum::Job, AttributeTypeEnum::Bio, AttributeTypeEnum::Company])->get() as $attribute)
                        <div class="flex items-center gap-4">
                            <div class="flex gap-2 w-28 min-w-28">
                                <div class="min-w-max">
                                    @svg($attribute->type->iconName(), 'w-6 h-6')
                                </div>
                                <p class="text-lg">{{ $attribute->type->label() }}</p>
                            </div>
                            {!! $attribute->type->htmlValue($attribute->value) !!}
                        </div>
                        @empty
                        <p>{{ __('Place for social links') }}</p>
                        @endforelse
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</div>
