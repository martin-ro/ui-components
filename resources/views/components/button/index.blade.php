@props([
    'color' => 'primary',
    'icon' => null,
    'iconPosition' => 'before',
    'tag' => 'button',
    'type' => 'button',
    'size' => 'md',
    'disabled' => false,
    'loading' => null,
])

@php
    $buttonClasses = generateClasses([
        'inline-flex items-center border shadow font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2',
        'disabled:shadow-none disabled:border-slate-200 disabled:bg-slate-50 disabled:text-slate-500',
        'bg-primary-500 hover:bg-primary-600 focus:ring-primary-500' => $color === 'primary',
        'text-white border-transparent shadow' => $color !== 'secondary',
        'shadow-sm border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 focus:ring-gray-500' => $color === 'secondary',
        'bg-danger-600 hover:bg-danger-700 focus:ring-danger-500 focus:bg-danger-700' => $color === 'danger',
        'bg-success-600 hover:bg-success-700 focus:ring-success-500 focus:bg-success-700' => $color === 'success',
        'bg-warning-500 hover:bg-warning-600 focus:ring-warning-400 focus:bg-warning-600' => $color === 'warning',
        'px-2.5 py-1.5 text-xs rounded' => $size === 'xs',
        'px-3 py-2 text-sm' => $size === 'sm',
        'px-4 py-2 text-sm' => $size === 'md',
        'px-4 py-2 text-base' => $size === 'lg',
        'px-6 py-3 text-base' => $size === 'xl',

    ]);
    $iconClasses = generateClasses([
        'h-4 w-4' => $size === 'sm',
        'w-5 h-5' => $size === 'md' or 'lg' or 'xl',
        '-ml-0.5 mr-2' => ($iconPosition === 'before') && ($size === 'sm'),
        '-ml-1 mr-2' => ($iconPosition === 'before') && ($size === 'md'),
        '-ml-1 mr-3' => ($iconPosition === 'before') && ($size === 'lg' or 'xl'),
        'ml-2 -mr-0.5' => ($iconPosition === 'after') && ($size === 'sm'),
        'ml-2 -mr-1' => ($iconPosition === 'after') && ($size === 'md'),
        'ml-3 -mr-1' => ($iconPosition === 'after') && ($size === 'lg' or 'xl'),
    ]);
@endphp

@if ($tag === 'button')
    <button
        type="{{ $type }}"
        {{ $attributes->class([$buttonClasses]) }}
    >
        @if ($icon && $iconPosition === 'before')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif

        @if($loading)
            <svg wire:loading wire:target="{{ $loading }}" class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-500"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @endif

        <span>{{ $slot }}</span>

        @if ($icon && $iconPosition === 'after')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif
    </button>
@elseif ($tag === 'a')
    <a {{ $attributes->class([$buttonClasses]) }}>
        @if ($icon && $iconPosition === 'before')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif

        <span>{{ $slot }}</span>

        @if ($icon && $iconPosition === 'after')
            <x-dynamic-component :component="$icon" :class="$iconClasses" />
        @endif
    </a>
@endif
