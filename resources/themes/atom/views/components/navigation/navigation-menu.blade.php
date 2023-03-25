<div class="relative flex hidden h-full w-full flex-col items-center gap-y-2 py-3 md:flex md:flex-row md:gap-x-8 md:gap-y-0 md:py-0" id="mobile-menu">
    @auth
        <x-navigation.dropdown icon="home" route-group="user*">
            {{ auth()->user()->username }}

            <x-slot:children>
                <a href="{{ route('me.show') }}"
                   class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
                    {{ __('Home') }}
                </a>

                <a href="{{ route('profile.show', auth()->user()->username) }}"
                   class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
                    {{ __('My Profile') }}
                </a>
            </x-slot:children>
        </x-navigation.dropdown>
    @else
        <a href="{{ route('welcome') }}"
           class="nav-item dark:text-gray-200 {{ request()->routeIs('welcome') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
            <i class="mr-1 hidden navigation-icon home lg:inline-flex"></i>
            {{ __('Home') }}
        </a>
    @endauth

    <x-navigation.dropdown icon="community" route-group="community*">
        {{ __('Community') }}

        <x-slot:children>
            <a href="{{ route('article.index') }}" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                {{ __('Articles') }}
            </a>

            <a href="{{ route('staff.index') }}" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                {{ __('Staff') }}
            </a>

            <a href="{{ route('teams.index') }}" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                {{ __('Teams') }}
            </a>

            <a href="{{ route('staff-applications.index') }}" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                {{ __('Staff applications') }}
            </a>

            <a href="{{ route('photos.index') }}" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                {{ __('Photos') }}
            </a>
        </x-slot:children>
    </x-navigation.dropdown>

    <a href="{{ route('leaderboard.index') }}"
       class="nav-item dark:text-gray-200 {{ request()->routeIs('leaderboard.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
        <i class="navigation-icon leaderboards mr-1 hidden lg:inline-flex"></i>
        {{ __('Leaderboards') }}
    </a>

    <a href="{{ route('values.index') }}"
       class="nav-item dark:text-gray-200 {{ request()->routeIs('values.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
        <i class="navigation-icon leaderboards mr-1 hidden lg:inline-flex"></i>
        {{ __('Rare values') }}
    </a>

    <a href="{{ route('shop.index') }}"
       class="nav-item dark:text-gray-200 {{ request()->routeIs('shop.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
            <i class="navigation-icon mr-1 hidden lg:inline-flex shop"></i>
            {{ __('Shop') }}
    </a>

    <a href="{{ route('rules.index') }}"
        class="nav-item dark:text-gray-200 {{ request()->routeIs('rules.*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
        <i class="mr-1 hidden navigation-icon rules lg:inline-flex"></i>
        {{ __('Rules') }}
    </a>

    <a href="{{ setting('discord_invitation_link') }}" target="_blank" class="nav-item dark:text-gray-200">
        {{ __('Discord') }}
    </a>
</div>
