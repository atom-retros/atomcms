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

    <div class="flex w-full justify-between md:w-auto">
        @auth(hasPermission('housekeeping_access'))
            <a data-turbolinks="false" href="/admin" target="_blank"
               class="h-10 text-sm font-semibold text-red-700 flex items-center gap-x-1 ml-5 md:ml-0">
                {{ __('Administration') }}
            </a>
        @endauth
    </div>
</div>
