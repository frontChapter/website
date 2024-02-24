@props(['submit'])

<div {{ $attributes }}>
    <form wire:submit="{{ $submit }}">
        <x-card>
            <x-slot:header>
                <x-section-title>
                    <x-slot name="title">{{ $title }}</x-slot>
                    <x-slot name="description">{{ $description }}</x-slot>
                </x-section-title>
            </x-slot:header>

            <div class="grid grid-cols-6 gap-6">
                {{ $form }}
            </div>

            @if (isset($actions))
            <x-slot:footer>
                {{ $actions }}
            </x-slot:footer>
            @endif
        </x-card>
    </form>
</div>
