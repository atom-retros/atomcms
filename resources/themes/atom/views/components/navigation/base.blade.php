<nav x-data="{ dropdownVisible: false }" class="relative bg-white shadow dark:bg-gray-900" x-on:click.outside="dropdownVisible = false">
    <div class="max-w-7xl min-h-[60px] px-4 md:flex md:items-center md:justify-between md:mx-auto">
        <div class="relative flex flex-col items-center w-full h-full py-3 md:flex-1 md:w-auto gap-y-2 md:flex md:flex-row md:gap-x-8 md:gap-y-0 md:py-0">
            <button class="relative block ml-auto text-gray-900 dark:text-white top-1.5 md:hidden" x-on:click="dropdownVisible = !dropdownVisible">
                <x-icon.hamburger />
            </button>

            @auth
                <x-navigation.item href="#" icon="home" :active="request()->routeIs('users*') || request()->routeIs('profiles')" dropdown>
                    {{ auth()->user()->username }}

                    <x-slot:children>
                        <x-dropdown.item href="{{ route('users.me') }}">{{ __('Home') }}</x-dropdown.item>
                        <x-dropdown.item href="{{ route('profiles', auth()->user()) }}">{{ __('My Profile') }}</x-dropdown.item>
                    </x-slot:children>
                </x-navigation.item>
            @endauth

            @guest
                <x-navigation.item href="{{ route('index') }}" icon="home" :active="request()->routeIs('index')">
                    {{ __('Home') }}
                </x-navigation.item>
            @endguest

            <x-navigation.item href="#" icon="community" :active="request()->routeIs('community*')" dropdown>
                {{ __('Community') }}

                <x-slot:children>
                    <x-dropdown.item href="{{ route('community.articles.index') }}">{{ __('Articles') }}</x-dropdown.item>
                    <x-dropdown.item href="{{ route('community.staff') }}">{{ __('Staff') }}</x-dropdown.item>
                    <x-dropdown.item href="{{ route('community.teams') }}">{{ __('Teams') }}</x-dropdown.item>
                    <x-dropdown.item href="{{ route('community.staff-applications.index') }}">{{ __('Staff applications') }}</x-dropdown.item>
                    <x-dropdown.item href="{{ route('community.photos.index') }}">{{ __('Photos') }}</x-dropdown.item>
                </x-slot:children>
            </x-navigation.item>

            <x-navigation.item href="{{ route('leaderboards') }}" icon="leaderboards" :active="request()->routeIs('leaderboards')">
                {{ __('Leaderboards') }}
            </x-navigation.item>

            <x-navigation.item href="{{ route('rare-values') }}" icon="leaderboards" :active="request()->routeIs('rare-values')">
                {{ __('Rare values') }}
            </x-navigation.item>

            <x-navigation.item href="{{ route('shop.index') }}" icon="shop" :active="request()->routeIs('shop.index')">
                {{ __('Shop') }}
            </x-navigation.item>

            <x-navigation.item href="#" icon="home" :active="request()->routeIs('help-center*')" dropdown>
                {{ __('Assistance') }}

                <x-slot:children>
                    <x-dropdown.item href="{{ route('help-center.index') }}">{{ __('Help Center') }}</x-dropdown.item>
                    <x-dropdown.item href="{{ route('help-center.rules') }}">{{ __('Rules') }}</x-dropdown.item>
                </x-slot:children>
            </x-navigation.item>
        </div>

        <div :class="dropdownVisible ? 'flex md:flex' : 'hidden md:flex'" class="justify-end w-full gap-3 py-3 md:justify-center md:w-auto md:py-0">
            <x-theme::theme.toggle />
            <x-locale::language.selector />
        </div>
    </div>
</nav>