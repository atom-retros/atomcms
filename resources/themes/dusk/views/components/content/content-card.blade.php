
@props(['icon' => '', 'classes' => ''])

<div class="w-full flex flex-col gap-y-4 rounded overflow-hidden bg-[#2b303c] pb-3 dark:bg-gray-800 shadow {{ $classes }}">
    <div class="flex gap-x-2 bg-[#21242e] p-3 dark:bg-gray-900">
        @if (empty($icon) === false)
        <div class="max-w-[50px] max-h-[50px] min-w-[50px] min-h-[50px] rounded-full relative flex items-center justify-center {{ $icon }}"></div>
        @endif
        <div class="flex flex-col justify-center text-sm">
            <p class="font-semibold">{{ $title }}</p>

            @if(isset($underTitle))
                <p class="dark:text-gray-500">{{ $underTitle }}</p>
            @endif
        </div>
    </div>

    <section class="h-full flex flex-col px-3">
        {{ $slot }}
    </section>
</div>
