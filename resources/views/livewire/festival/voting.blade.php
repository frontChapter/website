<div>
    @if (empty(auth()->user()->email_verified_at))
        <x-button class="w-full" warning :href="route('verification.notice')" :label="__('Verify Email Address')" />
        @section('check_email_verification_description', __('To vote, you must first validate your email.'))
    @elseif (count($votes) > 0)
        <x-button class="w-full" green wire:click="$toggle('showModal')" :label="__('شرکت در رای گیری')" />
        <x-modal blur align="center" wire:model.defer="showModal">
            @foreach ($votes as $vote)
            <x-card cardClasses="{{ $level === $loop->iteration ? '' : 'hidden' }} relative">
                <x-slot:title>
                    <span class="text-xl font-semibold text-right">{{ $vote->title }}</span>
                </x-slot:title>
                <x-slot:action>
                    <span class="opacity-80">{{ $level }} {{ __('of') }} {{ count($votes) }}</span>
                </x-slot:action>
                <div class="flex flex-col items-center justify-center gap-6 mx-auto">
                    @svg($vote->icon, 'w-24 h-24 my-2 mx-auto text-green-500')
                    <p class="text-2xl font-medium text-center">{{ $vote->description }}</p>
                    <div class="flex flex-col items-center gap-2 mx-auto lg:ms-auto min-w-max">
                        <p class="text-lg font-medium">{{ __('Carrot Vote') }}:</p>
                        <livewire:festival.vote-to-site wire:key='{{ $vote->id }}' :site="$site" :vote="$vote" />
                    </div>
                </div>
                <x-slot:footer>
                    <div class="flex justify-between">
                        @if ($level !== 1)
                        <x-button light outline :icon="app()->getLocale() === 'fa' ? 'arrow-right' : 'arrow-left'"
                            wire:click='previousLevel' :label="__('Previous')" />
                        @else
                        <span></span>
                        @endif
                        <x-button light outline :rightIcon="app()->getLocale() === 'fa' ? 'arrow-left' : 'arrow-right'"
                            wire:click='nextLevel' :label="__('Next')" />
                    </div>
                </x-slot:footer>
            </x-card>
            @endforeach
            <x-card cardClasses="{{ $level > count($votes) ? '' : 'hidden' }} relative">
                <div class="flex flex-col items-center justify-center gap-2 mx-auto">
                    <div class="flex items-end mb-6">
                        <img src="{{ asset('images/happy-carrot.jpg') }}" class="w-32 h-32 rounded" alt="{{ __('Happy Carrot') }}">
                    </div>
                    <h4 class="text-3xl font-bold">{{ __('Completed') }} 🎉</h4>
                    <p class="text-center">
                        {{ __('Your vote has been saved,') }}
                    </p>
                    <p class="text-center">
                        {{ __("But it's not the end! now it's time to send this page to your geek firends so they can vote too :)") }}
                    </p>
                </div>
                <x-slot:footer>
                    <div class="flex justify-between">
                        @if ($level !== 1)
                        <x-button light outline :icon="app()->getLocale() === 'fa' ? 'arrow-right' : 'arrow-left'"
                            wire:click='previousLevel' :label="__('Previous')" />
                        @else
                        <span></span>
                        @endif
                        <x-button negative outline icon="x" wire:click="$set('showModal', 0)" :label="__('Close')" />
                    </div>
                </x-slot:footer>
            </x-card>
        </x-modal>
    @endif
</div>
