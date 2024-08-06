@auth
    <div x-data="{ dropdownVisible: false }" {{ $attributes->merge(['class' => 'relative']) }}>
        <button class="w-8 h-8 flex items-center justify-center p-1 rounded-lg hover:gray-100 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700" @click="dropdownVisible = !dropdownVisible">
            <svg class="w-5 h-5 fill-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2 4C2 3.44772 2.44772 3 3 3H17C17.5523 3 18 3.44772 18 4C18 4.55228 17.5523 5 17 5H3C2.44772 5 2 4.55228 2 4ZM3 9C2.44772 9 2 9.44772 2 10C2 10.5523 2.44772 11 3 11H17C17.5523 11 18 10.5523 18 10C18 9.44772 17.5523 9 17 9H3ZM3 15C2.44772 15 2 15.44772 2 16C2 16.5523 2.44772 17 3 17H17C17.5523 17 18 16.5523 18 16C18 15.4477 17.5523 15 17 15H3Z"></path>
            </svg>
        </button>

        <div x-show="dropdownVisible" class="absolute mt-3 top-full z-20 bg-white rounded-lg w-56 shadow border dark:bg-gray-900 dark:border-gray-950" x-transition @click.outside="dropdownVisible = false">
            <a href="{{ route('users.settings.account.index') }}" class="block text-xs w-full px-3 py-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950">{{ __('navigation.account_settings') }}</a>
            <a href="{{ route('users.settings.password.index') }}" class="block text-xs w-full px-3 py-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950">{{ __('navigation.password') }}</a>
            <a href="{{ route('help-center.index') }}" class="block text-xs w-full px-3 py-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950">{{ __('navigation.help_center') }}</a>
            <a href="{{ route('help-center.rules') }}" class="block text-xs w-full px-3 py-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950">{{ __('navigation.rules') }}</a>
            <a href="{{ route('logout') }}" class="block text-xs w-full px-3 py-2 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-950">{{ __('navigation.logout') }}</a>
        </div>
    </div>
@endauth