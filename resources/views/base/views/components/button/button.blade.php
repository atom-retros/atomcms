@props(['type' => 'button'])

<button {{ $attributes->merge(['class' => 'relative text-sm font-medium overflow-hidden rounded px-5 py-2.5 text-white transition-all duration-300 hover:ring-2 hover:ring-offset-2']) }} type="{{ $type }}">
    <span class="relative">{{ $slot }}</span>
</button>
