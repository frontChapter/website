<div>
    <div class="grid flex-col grid-cols-12 gap-4">
        <h2 class="col-span-12 text-3xl font-bold">
            {{ __('Votes') }}
        </h2>
        @foreach ($votes as $vote)
        <x-card cardClasses="col-span-12 sm:col-span-6 lg:col-span-3 border border-green-500">
            <div class="flex flex-col h-full gap-2 text-center">
                @svg($vote->icon, 'w-24 h-24 my-6 mx-auto text-green-500')
                <h4 class="text-xl font-semibold text-gray-950 dark:text-secondary-50">
                    {{ $vote->title }}
                </h4>
                <p class="mb-4">{{ $vote->description }}</p>
                <div class="mx-auto mt-auto">
                    <livewire:festival.votes-results :vote="$vote" :site="$site" />
                </div>
            </div>
        </x-card>
        @endforeach
        <x-card cardClasses="col-span-12 sm:col-span-6 lg:col-span-3 border border-yellow-500">
            <div class="flex flex-col h-full gap-2 text-center">
                @svg('heroicon-s-chart-bar', 'w-24 h-24 my-6 mx-auto text-yellow-500')
                <h4 class="text-xl font-semibold text-gray-950 dark:text-secondary-50">
                    {{ __('Overall score') }}
                </h4>
                <p>
                    {{ __('This score is obtained automatically based on other scores') }}
                </p>
                <div class="flex flex-col items-center gap-4 mx-auto mt-auto">
                    <span class="text-2xl">({{ bcdiv($site->score, 1, 2) }})</span>
                    <x-carrot-score size="w-6 h-6" :score="$site->score" />
                </div>
            </div>
        </x-card>
        <div class="d-flex">
        </div>
    </div>
</div>
