@props(['type' => 'button'])

<x-button.button {{ $attributes->merge(['class' => 'bg-blue-500 hover:bg-blue-600 hover:ring-blue-600']) }} type="{{ $type }}">
    {{ $slot }}
</x-button.button>

