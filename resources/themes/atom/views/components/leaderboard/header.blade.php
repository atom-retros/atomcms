@props(['title', 'icon'])

<div class="flex gap-3 p-3 -mx-3 -mt-3 border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-900">
    <div @class([
        'flex items-center justify-center w-6 overflow-hidden outline outline-offset-[3px] rounded-full aspect-square',
        $attributes->get('class'),
    ])>
        <img src="{{ asset('images/icons/' . $icon) }}" alt="{{ $icon }}" />
    </div>

    <div class="flex flex-col justify-center text-sm">
        <p class="font-semibold text-black dark:text-gray-300">{{ $title }}</p>
    </div>
</div>