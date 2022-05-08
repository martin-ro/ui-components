@props([
    'active' => false,
])

<a {{ $attributes->class([
            'block rounded-md py-2 px-3 text-base font-medium',
            'text-gray-900 hover:bg-gray-50 hover:text-gray-900' => ! $active,
            'bg-gray-100 text-gray-900' => $active,
        ]) }}>
    {{ $slot }}
</a>
