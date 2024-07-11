@props(['user', 'position', 'value'])

<x-card class="flex items-center gap-3 p-3 bg-gray-100">
    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 dark:bg-gray-950 font-semibold text-xs">
        {{ $position }}
    </div>

    <x-avatar figure="{{ $user->look }}" username="{{ $user->username }}" size="s" headonly />

    <p class="text-sm flex-1">{{ $user->username }}</p>

    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $value($user) }}</p>
</x-card>