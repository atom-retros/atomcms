@props(['routeName'])

<button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbarUser"
        class="ml-4 flex items-center">
    {{ $slot }}

    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none"
         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
    </svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownNavbarUser" class="py-2 hidden z-10 w-44 bg-white shadow block">
    <x-navigation.dropdown-item route-name="me.show">
        {{ __('User settings') }}
    </x-navigation.dropdown-item>

    @auth
        <a
            href="{{ route('logout') }}"
            class="block py-2 px-4 hover:bg-gray-100 font-bold"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    @endauth
</div>