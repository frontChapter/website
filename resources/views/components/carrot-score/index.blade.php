@props([
    'score',
    'size' => 'w-4 h-4',
    'highestScore' => 5,
])


<div class="flex gap-0.5">
    @for ($count = 0; $count < $highestScore; $count++)
    @if( floor( $score )-$count >= 1 )
    <x-carrot-score.full class="{{ $size }}"/>
    @elseif( $score-$count > 0 )
    <x-carrot-score.half class="{{ $size }}"/>
    @else
    <x-carrot-score.empty class="{{ $size }}"/>
    @endif
    @endfor
</div>

