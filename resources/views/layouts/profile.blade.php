<div>
    <x-app-layout>
        <x-slot:header>
            <h2 class="text-xl font-semibold leading-tight text-secondary-800 dark:text-secondary-200">
                {{ __(":name's account", ['name' => auth()->user()->name]) }}
            </h2>
        </x-slot>
        @isset($headerAction)
        <x-slot:headerAction>
            {{ $headerAction }}
        </x-slot>
        @endisset

        <div class="container px-4 py-10 mx-auto sm:px-2 md:px-00">
            <div class="grid grid-cols-12 gap-x-8">
                <div class="col-span-12 md:col-span-4 lg:col-span-3">
                    <livewire:user.menu />
                </div>
                <div class="col-span-12 md:col-span-8 lg:col-span-9">
                    @if(isset($title))
                    <div class="flex items-center mb-8 justify-content-between">
                        <div>
                            @section('title', strip_tags($title))
                            {{ $title }}
                        </div>

                        @if(isset($titleAction))
                            <div class="ms-auto">
                                {{ $titleAction }}
                            </div>
                        @endisset
                    </div>
                    @endisset

                    @isset ($slot)
                    {{ $slot }}
                    @endisset
                    @yield('content')
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
