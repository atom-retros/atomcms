@props(['icon' => null, 'badge' => null, 'title' => null, 'subtitle' => null, 'guest' => false])

<div @class([
    'flex gap-3 p-3 -mx-3 -mt-3 border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-900',
    '!bg-transparent !border-0' => $guest,
    $attributes->get('class'),
])>
    @if ($icon || $badge || $iconSrc)
        <div
            class="flex items-center justify-center flex-shrink-0 w-12 h-12 overflow-hidden bg-orange-500 rounded-full flex-shrink-none"
            @if ($iconColor) style="background-color: {{ $iconColor }}!important" @endif
        >
            @if ($icon) <img src="{{ asset('images/icons/' . $icon . '_icon.png') }}" alt="{{ $icon }}">
            @elseif ($iconSrc) <img src="{{ Storage::url($iconSrc) }}" alt="{{ $iconSrc }}">
            @elseif ($badge) <img src="{{ Storage::disk('album1584')->url($badge . '.gif') }}" alt="{{ $badge }}"> @endif
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
