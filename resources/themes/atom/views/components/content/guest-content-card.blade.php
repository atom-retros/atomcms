@props(['icon', 'classes' => ''])

<div class="w-full flex flex-col gap-y-4 p-3 rounded-lg overflow-hidden {{ $classes }}">
    <div class="flex gap-x-2">
        <div
            class="max-w-[50px] max-h-[50px] min-w-[50px] min-h-[50px] rounded-full {{ $icon }} relative flex items-center justify-center">
        </div>

        <div class="flex flex-col">
            <p class="font-semibold text-black dark:text-gray-200">{{ $title }}</p>

            @if(isset($underTitle))
                <p class="dark:text-gray-500">{{ $underTitle }}</p>
            @endif
        </div>
    </div>

    {{ $slot }}
</div>
