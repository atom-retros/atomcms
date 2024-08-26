@props(['title', 'icon', 'items', 'fn'])

<x-card.base>
    <x-leaderboard.header title="{{ $title }}" icon="{{ $icon }}" class="{{ $attributes->get('class') }}" />

    <div class="flex flex-col gap-3 mt-3">
        @foreach ($items as $index => $item)
            <x-leaderboard.item :item="$item" :index="$index" :fn="$fn" />
        @endforeach
    </div>
</x-card.base>