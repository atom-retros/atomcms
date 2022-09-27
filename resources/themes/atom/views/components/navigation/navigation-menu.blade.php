<div class="hidden relative w-full h-full flex flex-col items-center gap-y-2 py-3 md:flex md:flex-row md:gap-x-8 md:gap-y-0 md:py-0" id="mobile-menu">
        <a href="{{ auth()->check() ? route('me.show') : route('welcome') }}"
           class="nav-item dark:text-gray-200 {{ request()->is('user*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
                {{ __('Home') }}
        </a>

        <button
                id="dropdownNavbarLink"
                data-dropdown-toggle="community-dropdown"
                class="dark:text-gray-200 {{ request()->is('community*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }} nav-item gap-x-1 ml-5 md:ml-0">
                {{ __('Community') }}

                <x-icons.chevron-down />
        </button>

        <div id="community-dropdown" class="py-2 hidden z-10 w-44 text-sm bg-white dark:bg-gray-800 shadow block">
            <a href="{{ route('article.index') }}" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                {{ __('Articles') }}
            </a>

            <a href="{{ route('staff.index') }}" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                {{ __('Staff') }}
            </a>

            <a href="{{ route('photos.index') }}" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                {{ __('Photos') }}
            </a>
        </div>

        <a href="{{ route('leaderboard.index') }}"
           class="nav-item dark:text-gray-200 {{ request()->routeIs('leaderboard.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
            {{ __('Leaderboards') }}
        </a>

        <a href="{{ route('shop.index') }}"
           class="nav-item dark:text-gray-200 {{ request()->routeIs('shop.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
                {{ __('Shop') }}
        </a>

        <a href="{{ route('rules.index') }}"
           class="nav-item dark:text-gray-200 {{ request()->routeIs('rules.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
                {{ __('Rules') }}
        </a>

        <a href="{{ setting('discord_invitation_link') }}" target="_blank" class="nav-item dark:text-gray-200">
            {{ __('Discord') }}
        </a>

    @auth()
        @if(auth()->user()->rank >= permission('min_rank_to_view_logs'))
            <a data-turbolinks="false" href="/log-viewer" target="_blank" class="nav-item dark:text-gray-200">
                {{ __('Error logs') }}
            </a>
        @endif

        @if(auth()->user()->rank >= setting('min_housekeeping_rank'))
            <a data-turbolinks="false" href="{{ setting('housekeeping_url') }}" target="_blank" class="nav-item dark:text-gray-200">
                {{ __('Housekeeping') }}
            </a>
        @endif
    @endauth
</div>
