<div class="hidden relative w-full h-full flex flex-col items-center gap-y-2 py-3 md:flex md:flex-row md:gap-x-8 md:gap-y-0 md:py-0" id="mobile-menu">
    {{-- md:justify-between gap-x-8 uppercase font-bold text-[14px] mt-5 --}}
        <a href="{{ route('me.show') }}"
           class="nav-item {{ request()->routeIs('me.show') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
                {{ __('Home') }}
        </a>

        <button
                id="dropdownNavbarLink"
                data-dropdown-toggle="community-dropdown"
                class="{{ request()->is('community*') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }} nav-item gap-x-1 ml-5 md:ml-0">
                {{ __('Community') }}

                <x-icons.chevron-down />
        </button>

        <div id="community-dropdown" class="py-2 hidden z-10 w-44 font-normal bg-white shadow block">
            <a href="#" class="dropdown-item">
                {{ __('Community') }}
            </a>

            <a href="{{ route('article.index') }}" class="dropdown-item">
                {{ __('Articles') }}
            </a>

            <a href="#" class="dropdown-item">
                {{ __('Staff') }}
            </a>
        </div>

        <a href="#"
           class="nav-item {{ request()->routeIs('community.index') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
                {{ __('Shop') }}
        </a>

        <a href="#"
           class="nav-item {{ request()->routeIs('community.index') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
                {{ __('Rules') }}
        </a>

        <a href="#"
           class="nav-item {{ request()->routeIs('community.index') ? 'md:border-b-4 md:border-b-[#eeb425]' : '' }}">
                {{ __('Discord') }}
        </a>
</div>