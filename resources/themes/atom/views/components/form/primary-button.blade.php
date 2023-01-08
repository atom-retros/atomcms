@props(['classes' => '', 'type' => 'submit'])

<button type="{{ $type }}" class="{{ $classes }} w-full rounded-md bg-[#eeb425] text-white p-2 border-2 border-yellow-400 transition ease-in-out duration-200 hover:scale-[102%] font-semibold">
    {{ $slot }}
</button>