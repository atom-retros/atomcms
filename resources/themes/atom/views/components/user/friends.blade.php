@props(['friends'])

<div class="flex flex-col gap-3 p-1 bg-white border rounded shadow dark:border-gray-900 dark:bg-gray-900 lg:flex-row">
    <div class="p-2 relative flex justify-center items-center rounded text-sm font-semibold dark:text-gray-300 bg-[#e9b124] dark:border-gray-700">
        <div class="absolute bg-[#e9b124] w-6 h-6 -right-1 rotate-45 invisible lg:visible"></div>
        <img src="{{ asset('images/icons/online-friends.png') }}" alt="{{ __('Online Friends') }}" class="flex mr-2 max-w-[24px] max-h-[24px]" />
        <span class="relative text-white">{{ __('Online Friends') }}</span>
    </div>

    <div class="flex items-center gap-3 px-3">
        @forelse($friends as $friend)
            <x-user.friend-item :friend="$friend" />
        @empty
            <p class="block w-full mb-3 text-xs font-medium text-center text-gray-500 dark:text-white md:text-left md:mb-0">{{ __('No friends online') }}</p>
        @endforelse
    </div>
</div>