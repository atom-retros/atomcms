@props(['type' => 'button'])

<x-button.button {{ $attributes->merge(['class' => 'bg-gray-900 hover:bg-gray-950 hover:ring-gray-950 dark:bg-gray-100 dark:text-gray-900 dark:hover:ring-gray-400 dark:hover:bg-gray-400']) }} type="{{ $type }}">
    {{ $slot }}
</x-button.button>

