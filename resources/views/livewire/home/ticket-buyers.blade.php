<div class="text-center mx-auto">
    @if(!empty($users))
    <h3 class="text-4xl leading-loose mt-12 font-extrabold text-green-500">{{ __('Participants in conference') }}</h3>
    <p class="text-xl mb-8">{{ __(':number people have registered so far', ['number' => count($users)]) }}</p>
    <x-card cardClasses="border-green-500 border">
        <div class="flex my-4 flex-wrap justify-center justify-items-center grid-cols-12 gap-2">
            @foreach ($users as $user)
            <a wire:navigate href="{{ route('profile', ['user' => $user]) }}" wire:key="{{ $user->id }}" class="w-32 h-32 group">
                <x-avatar xl class="bg-primary-300 mx-auto" src="{{ $user->profile_photo_url }}" :title="$user->name"
                    :alt="$user->name" />
                <p class="text-lg group-hover:text-black dark:group-hover:text-white transition-all">{{ $user->name }}</p>
            </a>
            @endforeach
        </div>

        {{-- <x-slot name="footer">
            {{ $users->links(data: ['scrollTo' => false]) }}
        </x-slot> --}}
    </x-card>

    @endif
</div>
