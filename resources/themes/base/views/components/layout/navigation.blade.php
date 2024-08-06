@auth
    <x-card class="bg-gray-100 dark:bg-gray-950 flex items-center overflow-x-auto">
        <nav class="flex-1 flex items-center">
            <a href="{{ route('users.me') }}" class="px-3 py-2 text-sm truncate text-center">{{ __('navigation.home') }}</a>
            <a href="{{ route('community.articles.index') }}" class="px-3 py-2 text-sm truncate text-center">{{ __('navigation.news') }}</a>
            <a href="{{ route('community.staff') }}" class="px-3 py-2 text-sm truncate text-center">{{ __('navigation.staff') }}</a>
            <a href="{{ route('community.teams') }}" class="px-3 py-2 text-sm truncate text-center">{{ __('navigation.teams') }}</a>
            <a href="{{ route('leaderboards') }}" class="px-3 py-2 text-sm truncate text-center">{{ __('navigation.leaderboards') }}</a>
        </nav>
    </x-card>
@endauth
