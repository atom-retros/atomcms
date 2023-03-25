<div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-2 dark:bg-gray-900 sm:px-6 lg:px-8">
    <div class="flex gap-x-6">
        <x-top-header-currency icon="nav-credit-icon">
            <x-slot:currency>
                {{ auth()->user()->credits }}
            </x-slot:currency>

            {{ __('Credits') }}
        </x-top-header-currency>

        <x-top-header-currency icon="nav-ducket-icon">
            <x-slot:currency>
                {{ auth()->user()->currency('duckets') }}
            </x-slot:currency>

            {{ __('Duckets') }}
        </x-top-header-currency>

        <x-top-header-currency icon="nav-diamond-icon">
            <x-slot:currency>
                {{ auth()->user()->currency('diamonds') }}
            </x-slot:currency>

            {{ __('Diamonds') }}
        </x-top-header-currency>
    </div>

    <div class="flex w-full justify-between md:w-auto h-full items-center">
        @auth
            @if(hasPermission('view_server_logs') || hasPermission('housekeeping_access'))
                <x-navigation.dropdown classes="!text-red-700 !border-none" child-classes="lg:ml-6">
                    {{ __('Administration') }}

                    <x-slot:children>
                        @if (hasPermission('view_server_logs'))
                            <a data-turbolinks="false" href="/log-viewer" target="_blank"
                               class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
                                {{ __('Error logs') }}
                            </a>
                        @endif

                        @if (hasPermission('housekeeping_access'))
                            <a data-turbolinks="false" href="{{ setting('housekeeping_url') }}" target="_blank"
                               class="dropdown-item dark:hover:bg-gray-700 dark:text-gray-200">
                                {{ __('Housekeeping') }}
                            </a>
                        @endif
                    </x-slot:children>
                </x-navigation.dropdown>
            @endif

            <x-navigation.dropdown classes="!border-none">
                <img class="h-12" src="{{ setting('avatar_imager') }}{{ auth()->user()->look }}&direction=2&headonly=1&head_direction=2&gesture=sml" alt="{{ auth()->user()->username }}">

                <span class="-ml-2">{{ auth()->user()->username }}</span>

                <x-slot:children>
                    <a href="{{ route('settings.account.show') }}"
                       class="block px-4 py-2 font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200">
                        {{ __('User settings') }}
                    </a>

                    <a href="{{ route('logout') }}"
                       class="block px-4 py-2 font-semibold hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </x-slot:children>
            </x-navigation.dropdown>
        @endauth
    </div>
</div>
