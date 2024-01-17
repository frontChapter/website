<div class="px-0 @if($separator) border-t border-secondary-200 dark:border-secondary-600 @endif">
    <h6 {{ $attributes->merge(['class' => "px-2 $classes"]) }}>
        {{ $label }}
    </h6>

    {{ $slot }}
</div>
