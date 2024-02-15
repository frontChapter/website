<div class="flex gap-2">
    <div x-data="{ hover: $wire.get('selectedVote') }" class="flex flex-col gap-1" @click="$wire.set('selectedVote', hover)">
        <input type="hidden" wire:model="selectedVote" class="hidden" />

        <x-loading wire:loading.flex wire:target="selectedVote"/>

        <div class="flex gap-1">
            <template x-for="item in [1,2,3,4,5]">
                <span @mouseenter="hover = item" @mouseleave="hover = $wire.get('selectedVote')" class="cursor-pointer group">
                    <span :class="{'hidden': (hover >= item)}">
                        <x-carrot-score.empty class="w-8 h-8" />
                    </span>
                    <span :class="{'hidden': (hover < item)}">
                        <x-carrot-score.full class="w-8 h-8" />
                    </span>
                </span>
            </template>
        </div>

        <p class="text-center opacity-80">
            <span x-text="hover"></span>
            <span>{{ __('of') }}</span>
            <span>5</span>
            <span>{{ __('Carrot Votes') }}</span>
        </p>

        <x-errors only="selectedVote" />
    </div>
</div>
