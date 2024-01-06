<div class="container mx-auto my-8">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 p-2 lg:col-span-6 xl:col-span-4">
            <x-card cardClasses="mt-8">
                <x-slot name="header">
                    <div class="relative flex gap-4 px-2 py-5 md:px-4">
                        <div class="z-40 -mt-12 w-28">
                            <x-avatar size="w-28 h-28" squared class="shadow-md" src="{{ $user->profile_photo_url }}"
                                alt="{{ $user->name }}" />
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <h4 class="text-2xl font-bold">{{ $user->name }}</h4>
                            <div class="flex items-center gap-0.5">
                                <p dir="ltr" class="h-4 leading-snug ltr:text-left rtl:text-right">
                                    {{ $user->username }}
                                </p>
                                <x-icon name="at-symbol" class="w-4 h-4" />
                            </div>
                        </div>
                        @if (auth()->id() === $user->id)
                        <div class="ms-auto">
                            <div class="hidden sm:block">
                                <x-button wire:navigate flat primary icon="pencil" :label="__('Edit Profile')"
                                    :href="route('profile.show')" />
                            </div>
                            <div class="block sm:hidden">
                                <x-button.circle wire:navigate flat primary icon="pencil"
                                    :href="route('profile.show')" />
                            </div>
                        </div>
                        @endif
                    </div>
                </x-slot>
                <div class="flex flex-col gap-2">
                    <div class="flex gap-4">
                        <div class="flex gap-2 w-28">
                            <x-heroicon-o-briefcase class="w-6 h-6" />
                            <p class="text-lg">{{ __('Job') }}</p>
                        </div>
                        <p class="text-lg">شغل من اینه</p>
                    </div>
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
                        <p class="text-lg">شغل من اینه</p>
                    </div>
                </div>
            </x-card>
        </div>
        <div class="col-span-12 p-2 lg:col-span-6 xl:col-span-8">
            <div class="flex flex-col gap-4 mt-8">
                @if (auth()->id() === $user->id && !$user->isCompleted())
                    <x-card cardClasses='mb-2' class="border rounded-lg shadow-lg border-error-700 shadow-error-100">
                        <div class="flex items-center gap-4">
                            <x-avatar class="shadow-lg" squared size="w-24 h-24" src="{{ asset('images/sad-carrot.jpg') }}"  alt="{{ __('Sad carrot') }}" />
                            <div class="flex flex-col justify-center gap-2 py-2">
                                <h4 class="text-xl font-semibold">{{ __('This beautiful carrot of ours is sad, because they could not be friends with you!') }}</h4>
                                <p>{{ __('Complete your profile so that both Front Chapter Carrot and us and other users can get to know you better. ❤️') }}</p>
                            </div>
                            <div class="ms-auto">
                                <div class="hidden sm:block">
                                    <x-button wire:navigate rounded primary icon="pencil" :label="__('Edit Profile')" :href="route('profile.show')" />
                                </div>
                                <div class="block sm:hidden">
                                    <x-button.circle wire:navigate primary icon="pencil" :href="route('profile.show')" />
                                </div>
                            </div>
                        </div>
                    </x-card>
                @endif
                <x-card :title="__('About me')">
                    @if(!empty($user->bio))
                    <p>{{ $user->bio }}</p>
                    @else
                    <p>{{ __('Write a little about yourself') }}</p>
                    @endif
                </x-card>
            </div>
        </div>
    </div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
