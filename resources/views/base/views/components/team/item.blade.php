@props(['user', 'team'])

<a href="{{ route('profiles', $user) }}">
    <x-card class="{{ !!$user->online ? '!bg-green-500 text-white' : '!bg-gray-100' }} flex items-center dark:!bg-gray-950 px-3">
        <x-avatar username="{{ $user->username }}" figure="{{ $user->look }}" headonly />
        <div class="flex flex-col gap-1 truncate">
            <p class="text-sm font-semibold">{{ $user->username }}</p>
            <p class="text-xs">{{ $team->rank_name }}</p>
        </div>
    </x-card>
</a>