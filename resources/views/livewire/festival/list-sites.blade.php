<x-slot name="header">
    <h2 class="text-lg font-semibold leading-tight sm:text-xl text-secondary-800 dark:text-secondary-200">
        {{ __('I am a HERO Festival') }}
    </h2>
</x-slot>
<x-slot name="headerAction">
    <div class="flex items-center h-full gap-2">
        <div class="hidden md:flex">
            <x-button target="_blank" icon="external-link" green href="https://festival.frontchapter.ir/i-am-a-hero"
                :label="__('More Details')" />
        </div>
        <x-button primary :href="route('festival-site.register')" :label="__('Register In Festival')" />
    </div>
</x-slot>

<div class="container mx-auto my-8">
    <div class="grid grid-cols-12 gap-4">
        <div class="flex justify-center col-span-12 md:hidden">
            <x-button target="_blank" icon="external-link" green href="https://festival.frontchapter.ir/i-am-a-hero"
                :label="__('More Details About Festival')" />
        </div>
        @forelse ($sites as $site)
        <a wire:navigate href="{{ route('festival-site.single', $site) }}"
            class="col-span-12 2xl:col-span-3 lg:col-span-4 md:col-span-6">
            <x-card>
                <div class="flex items-center gap-4">
                    <x-avatar squared size="h-14 w-14" :src="$site->logo_url" :alt="$site->name" />
                    <div>
                        <h2 class="mb-1 text-xl font-semibold">
                            {{ $site->name }}
                        </h2>
                        <p class="opacity-90">
                            {{ $site->url }}
                        </p>
                    </div>
                </div>
                <div class="flex justify-between gap-2 mx-auto mt-4">
                    <p>{{ __('Score') }}:</p>
                    <div class="d-flex">
                        <x-carrot-score showScore :score="$this->score($site->id)" />
                    </div>
                </div>
            </x-card>
        </a>
        @empty
        <div class="col-span-12">
            <x-empty-state :title="__('There are no sites.')"
                :description="__('Register the site you created in Liara from the register section so that we can display it here.')">
                <x-slot name="icon">
                    <x-heroicon-s-globe-alt class="w-24 h-24 mx-auto" />
                </x-slot>
            </x-empty-state>
        </div>
        @endforelse

        @if($sites->hasPages())
        <div class="col-span-12">
            <x-card>
                {{ $sites->links() }}
            </x-card>
        </div>
        @endif

    </div>
</div>
