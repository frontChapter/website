<div>
    <x-card :title="__('Votes')">
        <div class="flex flex-col gap-4">
            @foreach ($votes as $vote)
            <div class="flex flex-col gap-2">
                <h4 class="text-xl font-semibold">
                    {{ $vote->title }}
                </h4>
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-12 md:col-span-4 lg:col-span-3 xl:col-span-2">
                        <livewire:festival.votes-results :vote="$vote" :site="$site" />
                    </div>
                    <p class="col-span-12 md:col-span-8 lg:col-span-9 xl:col-span-10">{{ $vote->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </x-card>
</div>
