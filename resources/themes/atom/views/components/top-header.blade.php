<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 items-center flex justify-between py-2 dark:bg-gray-900">
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

<<<<<<< Updated upstream
    <div class="flex w-full justify-between md:w-auto">
        @auth
            @if(hasPermission('view_server_logs') || hasPermission('housekeeping_access'))
            <button
                    id="administrationDropdown"
                    data-dropdown-toggle="administration-dropdown"
                    class="h-10 text-sm font-semibold text-red-700 flex items-center gap-x-1 ml-5 md:ml-0">
                    {{ __('Administration') }}

                    <x-icons.chevron-down />
            </button>

            <div id="administration-dropdown" class="py-2 hidden z-10 w-44 text-sm bg-white dark:bg-gray-800 shadow block">
                @if(hasPermission('view_server_logs'))
                    <a data-turbolinks="false" href="/log-viewer" target="_blank" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                        {{ __('Error logs') }}
                    </a>
                @endif

                @if(hasPermission('housekeeping_access'))
                    <a data-turbolinks="false" href="{{ setting('housekeeping_url') }}" target="_blank" class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700">
                        {{ __('Housekeeping') }}
                    </a>
                @endif
            </div>
            @endif
        @endauth
        <x-navigation.user-dropdown />
=======
    <div class="flex gap-x-3">
        @if(hasPermission('view_server_logs') || hasPermission('housekeeping_access') || hasPermission('generate_logo'))
            <x-navigation.dropdown classes="!text-red-700 !border-none">
                {{ __('Administration') }}

                <x-slot:children>
                    @if (hasPermission('view_server_logs'))
                        <x-navigation.dropdown-child route="/log-viewer" :turbolink="false" target="_blank">
                            {{ __('Error logs') }}
                        </x-navigation.dropdown-child>
                    @endif

                    @if (hasPermission('generate_logo'))
                        <x-navigation.dropdown-child route="{{ route('logo-generator.index') }}" :turbolink="false" target="_blank">
                            {{ __('Logo generator') }}
                        </x-navigation.dropdown-child>
                    @endif

                    @if (hasPermission('housekeeping_access'))
                        <x-navigation.dropdown-child :route="setting('housekeeping_url')" :turbolink="false" target="_blank">
                            {{ __('Housekeeping') }}
                        </x-navigation.dropdown-child>
                    @endif
                </x-slot:children>
            </x-navigation.dropdown>
        @endif

        <x-navigation.dropdown classes="!border-none">
            <img class="h-12" src="{{ setting('avatar_imager') }}{{ auth()->user()->look }}&direction=2&headonly=1&head_direction=2&gesture=sml" alt="{{ auth()->user()->username }}">

            <span class="-ml-2">{{ auth()->user()->username }}</span>

            <x-slot:children>
                <x-navigation.dropdown-child :route="route('settings.account.show')">
                    {{ __('User settings') }}
                </x-navigation.dropdown-child>

                <button class="dropdown-item dark:text-gray-200 dark:hover:bg-gray-700 w-full text-left" @click.prevent="document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </x-slot:children>
        </x-navigation.dropdown>
>>>>>>> Stashed changes
    </div>
</div>
