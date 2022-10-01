
<a href="{{ route('settings.account.show') }}" class="{{ request()->routeIs('settings.account.show') ? 'bg-[#eeb425] text-white' : 'bg-gray-100 dark:bg-gray-900 text-gray-300' }} flex gap-x-2 justify-center items-center rounded p-2 md:p-6 text-center md:text-xl font-semibold transition duration-200 ease-in-out hover:bg-[#eeb425] hover:text-white">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>

    {{ __('Account settings') }}
</a>

<a href="{{ route('settings.password.show') }}" class="{{ request()->routeIs('settings.password.show') ? 'bg-[#eeb425] text-white' : 'bg-gray-100 dark:bg-gray-900 text-gray-300' }} flex gap-x-2 justify-center rounded p-2 md:p-6 text-center md:text-xl font-semibold transition duration-200 ease-in-out hover:bg-[#eeb425] hover:text-white">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
    </svg>

    {{ __('Password settings') }}
</a>
