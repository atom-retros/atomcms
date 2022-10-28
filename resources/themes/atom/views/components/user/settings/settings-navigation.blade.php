
<a href="{{ route('settings.account.show') }}" class="{{ request()->routeIs('settings.account.show') ? 'bg-[#eeb425] text-white' : 'bg-gray-100 dark:bg-gray-900' }} dark:text-gray-100 flex gap-x-2 justify-center items-center rounded p-2 md:p-6 text-center md:text-xl font-semibold transition duration-200 ease-in-out hover:bg-[#eeb425] hover:text-white">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>

    {{ __('Account settings') }}
</a>

<a href="{{ route('settings.password.show') }}" class="{{ request()->routeIs('settings.password.show') ? 'bg-[#eeb425] text-white' : 'bg-gray-100 dark:bg-gray-900' }} dark:text-gray-100 flex gap-x-2 justify-center rounded p-2 md:p-6 text-center md:text-xl font-semibold transition duration-200 ease-in-out hover:bg-[#eeb425] hover:text-white">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
    </svg>

    {{ __('Password settings') }}
</a>

<a href="{{ route('settings.two-factor') }}" class="{{ request()->routeIs('settings.two-factor') ? 'bg-[#eeb425] text-white' : 'bg-gray-100 dark:bg-gray-900' }} dark:text-gray-100 flex gap-x-2 justify-center rounded p-2 md:p-6 text-center md:text-xl font-semibold transition duration-200 ease-in-out hover:bg-[#eeb425] hover:text-white">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
    </svg>


    {{ __('Two factor') }}
</a>

<a href="{{ route('settings.session-logs') }}" class="{{ request()->routeIs('settings.session-logs') ? 'bg-[#eeb425] text-white' : 'bg-gray-100 dark:bg-gray-900' }} dark:text-gray-100 flex gap-x-2 justify-center rounded p-2 md:p-6 text-center md:text-xl font-semibold transition duration-200 ease-in-out hover:bg-[#eeb425] hover:text-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <rect x="5" y="3" width="14" height="18" rx="2" />
        <line x1="9" y1="7" x2="15" y2="7" />
        <line x1="9" y1="11" x2="15" y2="11" />
        <line x1="9" y1="15" x2="13" y2="15" />
    </svg>

    {{ __('Session logs') }}
</a>
