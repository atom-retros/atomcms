@props(['group'])

<div class="flex items-center justify-center rounded bg-gray-50 dark:bg-gray-900 aspect-square">
    <img src="{{ Storage::disk('album1584')->url($group->badge . '.gif') }}" alt="{{ $group->badge }}" />
</div>
