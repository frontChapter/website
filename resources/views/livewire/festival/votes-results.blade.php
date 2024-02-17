<div class="flex flex-col gap-2">
    @forelse ($siteVotes as $siteVote)
    <div class="flex gap-2">
        <x-carrot-score size="w-6 h-6" :score="$siteVote->vote" />
        <span>({{ __(':number votes', ['number' => $siteVote->count]) }})</span>
    </div>
    @empty
        <x-carrot-score size="w-6 h-6" :score="0" />
        <p>{{ __('No one has voted yet!') }}</p>
    @endforelse
</div>
