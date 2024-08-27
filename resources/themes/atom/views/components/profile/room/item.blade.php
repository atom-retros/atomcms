@props(['room'])

<div class="flex flex-col w-full p-1 overflow-hidden bg-gray-200 rounded-md gap-y-1 dark:bg-gray-900">
    <div class="flex items-center justify-center border rounded dark:border-gray-950 aspect-square">
        <img src="{{ asset('images/room_placeholder.png') }}" alt="{{ $room->name }}" />
    </div>
    <p class="w-full px-2 py-1 text-sm text-center truncate bg-gray-300 rounded dark:bg-gray-950 dark:text-white">{{ $room->name }}</p>
</div>