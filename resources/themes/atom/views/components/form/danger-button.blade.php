@props(['classes' => '', 'type' => 'submit'])

<button type="{{ $type }}" class="{{ $classes }} w-full rounded bg-red-600 hover:bg-red-700 text-white p-2 transition ease-in-out duration-150 font-semibold">
    {{ $slot }}
</button>