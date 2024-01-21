<div class="text-center mx-auto">
    @if(!empty($buyers))
    <h3 class="text-4xl leading-loose mt-12 font-extrabold text-green-500">{{ __('Participants in conference') }}</h3>
    <p class="text-xl mb-8">{{ __(':number people have registered so far', ['number' => count($buyers)]) }}</p>
    <x-card cardClasses="border-green-500 border">
        <div class="flex my-4 flex-wrap justify-center justify-items-center grid-cols-12 gap-2">
            @foreach ($buyers as $buyer)
            <a wire:key="{{ $buyer->id }}" class="w-32 h-32 group" @if (!empty($buyer->username))
                wire:navigate
                href="{{ route('profile', ['user' => $buyer->username]) }}"
                @endif >
                <x-avatar xl class="bg-primary-300 mx-auto" src="{{ $buyer->buyer_profile_photo_url }}" :title="$buyer->buyer_name"
                    :alt="$buyer->buyer_name" />
                <p @class(["text-lg", 'font-medium group-hover:text-black dark:group-hover:text-white transition-all' => !empty($buyer->username)])>{{ $buyer->buyer_name
                    }}
                </p>
            </a>
            @endforeach
        </div>

        {{-- <x-slot name="footer">
            {{ $users->links(data: ['scrollTo' => false]) }}
        </x-slot> --}}
    </x-card>

    @endif
</div>
