@props(['classes' => '', 'type' => 'submit'])

<button type="{{ $type }}"
    class="{{ $classes }} w-full rounded bg-[#eeb425] text-white p-2 border-2 border-yellow-400 transition ease-in-out duration-200 hover:bg-[#d49f1c] font-semibold">
    {{ $slot }}
</button>
