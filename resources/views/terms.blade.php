<x-guest-layout>
    <div class="pt-4 bg-secondary-100 dark:bg-secondary-900">
        <div class="flex flex-col items-center min-h-screen pt-6 sm:pt-0">
            <div>
                <x-authentication-card-logo />
            </div>

            <div class="w-full p-6 mt-6 overflow-hidden prose bg-white shadow-md sm:max-w-2xl dark:bg-secondary-800 sm:rounded-lg dark:prose-invert">
                {!! $terms !!}
            </div>
        </div>
    </div>
</x-guest-layout>
