@props(['routeName'])

<button
    id="dropdownNavbarLink"
    data-dropdown-toggle="dropdownNavbar"
    class="{{ request()->routeIs($routeName) ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }} ml-5 md:ml-0 transition ease-in-out duration-200 flex uppercase pb-[15px] font-bold md:hover:border-b-4 md:hover:border-b-[#eeb425]">
    {{ $slot }}

    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4 mt-[1px]" fill="none"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
    </svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownNavbar" class="py-2 hidden z-10 w-44 font-normal bg-white shadow block">
    <x-navigation.dropdown-item route-name="community.index">
        {{ __('Community') }}
    </x-navigation.dropdown-item>

    <x-navigation.dropdown-item route-name="community.index">
        {{ __('Articles') }}
    </x-navigation.dropdown-item>

    <x-navigation.dropdown-item route-name="community.index">
        {{ __('Staff') }}
    </x-navigation.dropdown-item>
</div>