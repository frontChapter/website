@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="flex justify-between flex-1 sm:hidden">
                <span>
                    @if ($paginator->onFirstPage())
                        <x-button class="!opacity-50" disabled light :icon="app()->getLocale() === 'fa' ? 'chevron-right' : 'chevron-left'" :label="__('Previous')" />
                    @else
                        <x-button type="button" light wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" :icon="app()->getLocale() === 'fa' ? 'chevron-right' : 'chevron-left'" :label="__('Previous')" />
                    @endif
                </span>

                <span>
                    @if ($paginator->hasMorePages())
                        <x-button type="button" light wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" :icon="app()->getLocale() === 'fa' ? 'chevron-left' : 'chevron-right'" :label="__('Next')" />
                    @else
                        <x-button class="!opacity-50" disabled light :icon="app()->getLocale() === 'fa' ? 'chevron-left' : 'chevron-right'" :label="__('Next')" />
                    @endif
                </span>
            </div>

            <div class="hidden gap-2 sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm leading-5 text-secondary-700 dark:text-secondary-300">
                        <span>{!! __('Showing') !!}</span>
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('to') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('of') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        <span>{!! __('results') !!}</span>
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex gap-2 rounded-md shadow-sm">
                        <span>
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <x-button.circle class="!rounded !opacity-50" disabled light :icon="app()->getLocale() === 'fa' ? 'chevron-right' : 'chevron-left'" />
                            @else
                                <x-button.circle type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" rel="prev" class="!rounded" light :icon="app()->getLocale() === 'fa' ? 'chevron-right' : 'chevron-left'" aria-label="{{ __('Next') }}" />
                            @endif
                        </span>

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 cursor-default select-none">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <x-button.circle class="!rounded" disabled primary outline :label="$page" />
                                        @else
                                            <x-button.circle :label="$page" type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}" aria-label="{{ __('Next') }}" class="!rounded" light />
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach

                        <span>
                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <x-button.circle type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" rel="next" class="!rounded" light :icon="app()->getLocale() === 'fa' ? 'chevron-left' : 'chevron-right'" aria-label="{{ __('Previous') }}" />
                            @else
                                <x-button.circle class="!rounded !opacity-50" disabled light :icon="app()->getLocale() === 'fa' ? 'chevron-left' : 'chevron-right'" />
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
