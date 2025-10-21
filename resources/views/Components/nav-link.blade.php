@props(['active' => false])

@php
    $classes = $active
        ? 'bg-gray-900 text-white rounded-lg px-3 py-2 text-sm font-semibold transition-all duration-300 shadow-md'
        : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg px-3 py-2 text-sm font-medium transition-all duration-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
