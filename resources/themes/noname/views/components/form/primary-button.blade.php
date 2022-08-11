@props(['classes' => '', 'type' => 'submit'])

<button type="{{ $type }}" class="{{ $classes }} mt-2 w-full rounded-md bg-[#eeb425] text-white p-2 transition ease-in-out duration-200 hover:scale-[102%] font-bold">
    {{ $slot }}
</button>