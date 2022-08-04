<div class="hidden w-full md:block md:w-auto" id="mobile-menu">
    <div class="flex flex-col items-center md:flex-row md:items-start gap-x-8 uppercase font-bold text-[14px] mt-5">
        <x-navigation.navigation-item route-name="me.show">
            {{ __('Home') }}
        </x-navigation.navigation-item>

        <x-navigation.dropdown-menu route-name="community.index">
            {{ __('Community') }}
        </x-navigation.dropdown-menu>

        <x-navigation.navigation-item route-name="community.index">
            {{ __('Shop') }}
        </x-navigation.navigation-item>

        <x-navigation.navigation-item route-name="community.index">
            {{ __('Rules') }}
        </x-navigation.navigation-item>

        <x-navigation.navigation-item route-name="community.index">
            {{ __('Discord') }}
        </x-navigation.navigation-item>
    </div>
</div>