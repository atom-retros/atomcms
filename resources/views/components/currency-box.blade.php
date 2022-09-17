@props(['primaryColor', 'secondaryColor'])

<div class="flex h-[45px] col-span-4 sm:col-span-2 md:col-span-1">
    <div class="w-1/3 {{ $secondaryColor }} rounded-l flex items-center justify-center">
        {{ $icon }}
    </div>

    <div class="p-2 rounded rounded-l-none {{ $primaryColor }} w-2/3 font-semibold flex justify-center items-center">
        {{ $slot }}
    </div>
</div>