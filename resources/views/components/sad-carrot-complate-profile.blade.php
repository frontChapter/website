@if ($show)
<x-card cardClasses='mb-2' class="border rounded-lg shadow-lg border-error-700 shadow-error-100">
    <div class="flex flex-col items-center justify-center gap-4 lg:flex-row">
        <x-avatar class="shadow-lg" squared size="w-48 h-48 lg:w-24 lg:h-24" src="{{ asset('images/sad-carrot.jpg') }}"
            alt="{{ __('Sad carrot') }}" />
        <div class="flex flex-col justify-center gap-2 py-2 text-center lg:text-start">
            <h4 class="text-xl font-semibold">
                {{ __('This beautiful carrot of ours is sad, because they could not be friends with you!') }}
            </h4>
            <p>
                {{ __('Complete your profile so that both Front Chapter Carrot and us and other users can get to know you better. ❤️') }}
            </p>
        </div>
        <div class="lg:ms-auto min-w-max">
            <x-button wire:navigate rounded primary icon="pencil" :label="__('Edit Profile')"
                :href="route('profile.show')" />
        </div>
    </div>
</x-card>
@endif
