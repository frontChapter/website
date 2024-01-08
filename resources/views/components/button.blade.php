<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-secondary-800 dark:bg-secondary-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-secondary-800 uppercase tracking-widest hover:bg-secondary-700 dark:hover:bg-white focus:bg-secondary-700 dark:focus:bg-white active:bg-secondary-900 dark:active:bg-secondary-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
