 @props(['icon' => '', 'classes' => ''])

<div class="w-full flex flex-col gap-y-4 rounded overflow-hidden bg-white pb-3 shadow {{ $classes }}">
    <div class="flex gap-x-2 border-b p-3 bg-gray-50">
        <div class="max-w-[50px] max-h-[50px] min-w-[50px] min-h-[50px] rounded-full relative flex items-center justify-center {{ $icon }}"></div>

        <div class="flex flex-col text-sm justify-center">
            <p class="text-black font-semibold">{{ $title }}</p>
            <p>{{ $underTitle }}</p>
        </div>
    </div>

    <section class="px-3">
        {{ $slot }}
    </section>
</div>