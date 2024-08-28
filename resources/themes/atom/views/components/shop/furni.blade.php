@props(['furniture'])

<div class="relative flex flex-col w-full p-1 rounded aspect-square bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center flex-1">
        <img src="{{ $furniture->item->icon }}" alt="{{ $furniture->item->public_name }}" />
    </div>
    <p class="block py-px text-xs text-center text-gray-600 bg-gray-200 rounded-sm dark:bg-gray-950 dark:text-white">x {{ $furniture->amount }}</p>
</div>