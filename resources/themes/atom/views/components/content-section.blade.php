 @props(['icon'])

<div class="w-full flex flex-col gap-y-4">
    <div class="flex gap-x-2">
        <div class="w-[50px] h-[50px] rounded-full {{ $icon }} relative flex items-center justify-center"></div>

        <div class="flex flex-col">
            <p class="text-black font-bold">{{ $title }}</p>
            <p>{{ $underTitle }}</p>
        </div>
    </div>

    {{ $slot }}
</div>