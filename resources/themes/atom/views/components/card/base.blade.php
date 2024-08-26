@props(['icon' => null, 'title' => null, 'subtitle' => null, 'contentClass' => ''])

<div @class([
    'flex flex-col gap-3 p-3 overflow-hidden bg-white border rounded shadow dark:border-gray-900 dark:bg-gray-800',
    $attributes->get('class'),
])>
    @if ($icon || $title || $subtitle)
        <x-card.header :icon="$icon" :title="$title" :subtitle="$subtitle" />
    @endif

    <section @class([
        'flex flex-col h-full',
        $contentClass,
    ])>
        {{ $slot }}
    </section>
</div>
