@props(['id' => null, 'maxWidth' => null])

<x-modal-ui :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-secondary-900 dark:text-secondary-100">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-secondary-600 dark:text-secondary-400">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-secondary-100 dark:bg-secondary-800 text-end">
        {{ $footer }}
    </div>
</x-modal-ui>
