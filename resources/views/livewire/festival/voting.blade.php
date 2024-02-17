<div>
    @if (count($votes) > 0)
    <x-button green icon="external-link" wire:click="$toggle('showModal')" :label="__('شرکت در رای گیری')" />
    <x-modal blur align="center" wire:model.defer="showModal">
        @foreach ($votes as $vote)
        <x-card cardClasses="{{ $level === $loop->iteration ? '' : 'hidden' }} relative">
            <x-slot:title>
                <span class="text-xl font-semibold text-right">{{ $vote->title }}</span>
            </x-slot:title>
            <x-slot:action>
                <span class="hidden opacity-80 md:block">{{ $level }} {{ __('of') }} {{ count($votes) }}</span>
            </x-slot:action>
            <div class="flex flex-col items-center justify-center mx-auto gap-x-4 gap-y-2">
                <p class="text-center">{{ $vote->description }}</p>
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
                    <x-carrot-score.full class="w-8 h-8" />
                    <x-carrot-score.full class="w-12 h-12" />
                    <x-carrot-score.full class="w-20 h-20" />
                    <x-carrot-score.full class="w-12 h-12" />
                    <x-carrot-score.full class="w-8 h-8" />
                </div>
                <h4 class="text-3xl font-bold">{{ __('Completed') }} 🎉</h4>
                <p class="text-center">
                    {{ __('All your votes are saved and influence the selection of the winner.') }}
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
