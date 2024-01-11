@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center w-full ps-3 pe-4 py-2 border-s-4 border-primary-400 dark:border-primary-600 text-start text-base font-medium text-primary-700 dark:text-primary-300 bg-primary-50 dark:bg-primary-900/50 focus:outline-none focus:text-primary-800 dark:focus:text-primary-200 focus:bg-primary-100 dark:focus:bg-primary-900 focus:border-primary-700 dark:focus:border-primary-300 transition duration-150 ease-in-out'
            : 'flex items-center w-full ps-3 pe-4 py-2 border-s-4 border-transparent text-start text-base font-medium text-secondary-600 dark:text-secondary-400 hover:text-secondary-800 dark:hover:text-secondary-200 hover:bg-secondary-50 dark:hover:bg-secondary-700 hover:border-secondary-300 dark:hover:border-secondary-600 focus:outline-none focus:text-secondary-800 dark:focus:text-secondary-200 focus:bg-secondary-50 dark:focus:bg-secondary-700 focus:border-secondary-300 dark:focus:border-secondary-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
