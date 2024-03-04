<div class="mx-auto text-center">
    @if(!empty($buyers))
    <h3 class="mt-12 text-4xl font-extrabold leading-loose text-green-500">{{ __('Participants in Front Chapter conference 2024') }}</h3>
    <p class="mb-8 text-xl">{{ __(':number people have registered', ['number' => count($buyers)]) }}</p>
    <x-card cardClasses="border-green-500 border">
        <div class="flex flex-wrap justify-center grid-cols-12 gap-2 my-4 justify-items-center">
            @foreach ($buyers as $buyer)
            <a wire:key="{{ $buyer->id }}" class="w-32 h-32 group" @if (!empty($buyer->username))
                wire:navigate
                href="{{ route('profile', ['user' => $buyer->username]) }}"
                @endif >
                <x-avatar xl class="mx-auto bg-primary-300" src="{{ $buyer->buyer_profile_photo_url }}" :title="$buyer->buyer_name"
                    :alt="$buyer->buyer_name" />
                <p @class([
                    "text-lg overflow-hidden truncate",
                    'font-medium text-secondary-300 group-hover:text-primary-500 dark:group-hover:text-primary-500 transition-all' => !empty($buyer->username),
                    'text-secondary-400' => empty($buyer->username)
                ])>
                    {{ $buyer->buyer_name }}
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
