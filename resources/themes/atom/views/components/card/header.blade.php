@props(['icon' => null, 'badge' => null, 'title' => null, 'subtitle' => null])

<div class="flex gap-3 p-3 -mx-3 -mt-3 border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-900">
    @if ($icon)
        <div class="flex items-center justify-center w-12 h-12 overflow-hidden bg-orange-500 rounded-full flex-shrink-none">
            <img src="{{ asset('images/dusk/' . $icon . '_icon.png') }}" alt="{{ $icon }}">
        </div>
    @endif

    @if ($badge)
        <div class="flex items-center justify-center w-12 h-12 overflow-hidden bg-orange-500 rounded-full flex-shrink-none">
            <img src="{{ Storage::disk('album1584')->url($badge . '.gif') }}" alt="{{ $icon }}">
        </div>
    @endif

    <div class="flex flex-col justify-center text-sm">
        @if($title)
            <p class="font-semibold text-black dark:text-gray-300">{{ $title }}</p>
        @endif

        @if($subtitle)
            <p class="dark:text-gray-500">{{ $subtitle }}</p>
        @endif
    </div>
</div>
