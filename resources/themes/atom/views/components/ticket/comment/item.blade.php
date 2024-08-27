@props(['reply'])

<x-card.base class="!p-0">
    <div class="flex items-center gap-3 px-3 h-16 py-1.5 border-b bg-gray-50 dark:border-gray-700 dark:bg-gray-900 overflow-hidden">
        <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->username }}" class="mt-8 drop-shadow">
        <p class="flex-1 text-sm dark:text-white">{{ $reply->user->username }}</p>
        <p class="text-xs text-gray-400">{{ $reply->created_at->diffForHumans() }}</p>
    </div>

    <div class="p-3 dark:text-white">
        {{ $reply->content }}
    </div>
</x-card.base>