<div class="flex flex-col col-span-12 gap-3 md:col-span-3">
    <a href="{{ route('users.settings.account.index') }}" @class([
        'bg-gray-100 dark:bg-gray-900 dark:text-gray-100 flex gap-x-2 justify-center items-center rounded p-2 md:p-6 text-center md:text-xl font-semibold transition duration-200 ease-in-out hover:bg-[#eeb425] hover:text-white',
        '!bg-[#eeb425] !text-white' => request()->routeIs('users.settings.account.index'),
    ])>{{ __('Account settings') }}</a>

    <a href="{{ route('users.settings.password.index') }}" @class([
        'bg-gray-100 dark:bg-gray-900 dark:text-gray-100 flex gap-x-2 justify-center items-center rounded p-2 md:p-6 text-center md:text-xl font-semibold transition duration-200 ease-in-out hover:bg-[#eeb425] hover:text-white',
        '!bg-[#eeb425] !text-white' => request()->routeIs('users.settings.password.index'),
    ])>{{ __('Password settings') }}</a>
</div>

<div class="flex flex-col col-span-12 gap-3 md:col-span-9">
    {{ $slot }}
</div>