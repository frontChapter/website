@if ($hasErrors($errors))
    <div {{ $attributes->merge(['class' => 'rounded-lg bg-negative-50 dark:bg-secondary-800 dark:border dark:border-negative-600 p-4']) }}>
        <div class="flex items-center pb-3 border-b-2 border-negative-200 dark:border-negative-700">
            <x-dynamic-component
                :component="WireUi::component('icon')"
                class="w-5 h-5 me-3 text-negative-400 dark:text-negative-600 shrink-0"
                name="exclamation-circle"
            />

            <span class="text-sm font-semibold text-negative-800 dark:text-negative-600">
                {{ str_replace('{errors}', $count($errors), $title) }}
            </span>
        </div>

        <div class="mt-2 ms-5 ps-1">
            <ul class="space-y-1 text-sm list-disc text-negative-700 dark:text-negative-600">
                @foreach ($getErrorMessages($errors) as $message)
                    <li>{{ head($message) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <div class="hidden"></div>
@endif

