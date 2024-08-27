@props(['friend'])

<div class="flex items-center justify-center overflow-hidden rounded bg-gray-50 dark:bg-gray-900 aspect-square">
    <img src="{{ $friend->friend->avatar }}&headonly=1" alt="{{ $friend->friend->username }}" />
</div>