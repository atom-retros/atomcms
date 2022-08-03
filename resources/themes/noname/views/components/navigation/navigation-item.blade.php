@props(['routeName'])

<a
    href="{{ route($routeName) }}"
    class="
            {{ request()->routeIs($routeName) ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }} transition duration-200 ease-in-out pb-[15px] font-bold md:hover:border-b-4 md:hover:border-b-[#eeb425]">
    {{ $slot }}
</a>