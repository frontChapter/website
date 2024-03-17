<x-slot name="header">
    <h2 class="text-lg font-semibold leading-tight sm:text-xl text-secondary-800 dark:text-secondary-200">
        🔥 {{ __('Complete archive of images of the 2024 conference') }}
    </h2>
</x-slot>

<div class="container mx-auto my-8 max-w-3xl md:h-[45rem] max-h-full">
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
        <a href="https://drive.google.com/drive/folders/1eforrcIR89dXlsmip1MnhUVESLymspzc?usp=sharing" class="col-span-1 transition-transform hover:scale-105 group">
            <x-card cardClasses="h-full" class="flex flex-col items-center justify-center gap-8">
                <x-slot:header>
                    <img class="w-full mx-auto rounded-t-xl"  src="{{ asset('images/conference-night.jpg') }}">
                </x-slot:header>
                <div class="flex items-center justify-center w-full gap-2 px-2 text-start sm:justify-between">
                    <h2 class="text-xl font-bold lg:text-2xl">
                        {{ __('Archive of the night before the conference') }}
                    </h2>
                    @svg( app()->getLocale() === 'fa' ? 'heroicon-o-arrow-left' : 'heroicon-o-arrow-right', 'hidden sm:block w-8 me-8
                    opacity-0 group-hover:me-0 group-hover:w-8 group-hover:opacity-100
                    transition-all')
                </div>
            </x-card>
        </a>
        <a href="https://drive.google.com/drive/folders/12PUZbSPcSB5V_itup4Qi7gN8sEXT4Shr?usp=sharing" class="col-span-1 transition-transform hover:scale-105 group">
            <x-card cardClasses="h-full" class="flex flex-col items-center justify-center gap-8">
                <x-slot:header>
                    <img class="w-full mx-auto rounded-t-xl"  src="{{ asset('images/conference.jpg') }}">
                </x-slot:header>
                <div class="flex items-center justify-center w-full gap-2 px-2 text-start sm:justify-between">
                    <h2 class="text-xl font-bold lg:text-2xl">
                        {{ __('Archives of the day of the conference') }}
                    </h2>
                    @svg( app()->getLocale() === 'fa' ? 'heroicon-o-arrow-left' : 'heroicon-o-arrow-right', 'hidden sm:block w-8 me-8
                    opacity-0 group-hover:me-0 group-hover:w-8 group-hover:opacity-100
                    transition-all')
                </div>
            </x-card>
        </a>
    </div>
    <x-alert class="mt-10" icon="information-circle">
        <p class="text-lg">{!! __('Do not avoid making memes and mentioning @frontchapter when publishing.') !!}</p>
    </x-alert>
</div>
