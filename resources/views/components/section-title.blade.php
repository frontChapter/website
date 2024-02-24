<div class="flex justify-between p-4 border-b border-b-secondary-300 dark:border-b-secondary-700">
    <div>
        <h3 class="text-lg font-medium text-secondary-900 dark:text-secondary-100">{{ $title }}</h3>

        <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
