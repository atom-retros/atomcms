@props(['badge'])

<div class="flex items-center justify-center rounded bg-gray-50 dark:bg-gray-900 aspect-square">
    <img src="{{ Storage::disk('album1584')->url($badge->badge_code . '.gif') }}" alt="{{ $badge->badge_code }}" />
</div>