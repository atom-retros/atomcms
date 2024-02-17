@props(['icon'])

<div class="gap-x-3 flex">
    <div class="h-[25px] w-[25px] rounded-full {{ $icon }} outline-offset-[3px]"></div>

    <div class="dark:text-gray-400 flex gap-x-2">
        <span class="font-semibold dark:text-white">
            {{ $currency }}
        </span>

        {{ $slot }}
    </div>
</div>
