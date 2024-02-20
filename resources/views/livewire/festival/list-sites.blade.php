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
            class="col-span-12 @if(!in_array($loop->iteration, [1,2,3])) 2xl:col-span-3 @endif lg:col-span-4 md:col-span-6 ">

            <div
                class="overflow-hidden rounded-lg bg-white dark:bg-secondary-800 @if(in_array($loop->iteration, [1,2,3])) border-2 border-indigo-500 !bg-indigo-600 text-white @endif">

                <div
                    style="@if(in_array($loop->iteration, [1,2,3])) background: url('{{ asset('images/carrot-pattern.png') }}'); background-size:64px @endif">
                    <div
                        class="@if(in_array($loop->iteration, [1,2,3])) bg-gradient-to-br from-indigo-500/40 via-indigo-500/85 via-15% to-30% to-indigo-500 @endif">
                        <div class="px-5 py-5">
                            <div class="flex items-center gap-4">
                                <x-avatar squared size="h-14 w-14" :src="$site->logo_url" :alt="$site->name" />
                                <div class="w-[calc(100%-4.5rem)]">
                                    <h2
                                        class="@if(in_array($loop->iteration, [1,2,3])) text-white @endif mb-1 text-xl font-semibold">
                                        {{ $site->name }}
                                    </h2>
                                    <p class="@if(in_array($loop->iteration, [1,2,3])) text-white @endif flex-1 overflow-hidden whitespace-nowrap max-w-fit opacity-90 text-ellipsis rtl:text-right"
                                        dir="ltr">
                                        {{ $site->url }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-between gap-2 mx-auto mt-4">
                                <p>{{ __('Score') }}:</p>
                                <div class="d-flex">
                                    <x-carrot-score showScore :score="$site->score" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
