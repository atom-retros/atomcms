@props(['comment'])

<div class="relative w-full rounded bg-[#f5f5f5] dark:bg-gray-700 p-4 h-[90px] overflow-hidden flex items-center shadow">
    <a href="{{ route('profiles', $comment->user) }}" class="absolute top-2 left-1 drop-shadow">
        <img src="{{ $comment->user->avatar }}&direction=2&head_direction=3&gesture=sml&action=wav" alt="{{ $comment->user->username }}" class="transition duration-300 ease-in-out hover:scale-105 image-rendering-pixelated" />
    </a>

    <div class="flex justify-between ml-[60px] w-full">
        <div class="flex flex-col gap-1">
            <a href="{{ route('profiles', $comment->user) }}" class="font-semibold text-sm text-[#89cdf0] dark:text-blue-300 hover:underline">{{ $comment->user->username }}</a>
            <p class="block text-sm dark:text-gray-200">{{ $comment->comment }}</p>
        </div>
        <p class="text-xs dark:text-gray-200">{{ $comment->created_at->diffForHumans() }}</p>
    </div>
</div>