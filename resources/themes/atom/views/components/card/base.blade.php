@props(['icon' => null, 'badge' => null, 'title' => null, 'subtitle' => null, 'contentClass' => '', 'iconSrc' => null, 'iconColor' => null, 'guest' => false])

<div @class([
    'flex flex-col gap-3 p-3 overflow-hidden bg-white border rounded shadow dark:border-gray-900 dark:bg-gray-800',
    '!bg-transparent !border-0 !shadow-none !p-0 !overflow-visible' => $guest,
    $attributes->get('class'),
])>
    @if ($icon || $title || $subtitle)
        <x-card.header :guest="$guest" :icon="$icon" :badge="$badge" :title="$title" :subtitle="$subtitle" :icon-src="$iconSrc" :icon-color="$iconColor" />
    @endif

    <section @class([
        'flex flex-col h-full',
        $contentClass,
    ])>
        {{ $slot }}
    </section>
</div>
