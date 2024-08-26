<div class="bg-white dark:bg-gray-900">
    <div class="max-w-7xl h-[60px] px-4 flex items-center justify-between md:mx-auto">
        <div class="flex items-center h-full gap-6">
            <x-header.currency-item class="bg-[#e9b124] outline-[#b26d18]" icon="credits" :amount="auth()->user()->credits" text="{{ __('Credits') }}" />
            <x-header.currency-item class="bg-[#c44aac] outline-[#812378]" icon="duckets" :amount="auth()->user()->currencies->firstWhere('type', 0)?->amount ?? 0" text="{{ __('Duckets') }}" />
            <x-header.currency-item class="bg-[#caf1f3] outline-[#6caff4]" icon="diamonds" :amount="auth()->user()->currencies->firstWhere('type', 5)?->amount ?? 0" text="{{ __('Diamonds') }}" />
        </div>

        <div class="flex items-center h-full gap-6">
            <x-dropdown.base alignment="right">
                <div class="flex-shrink-0 w-8 h-8 bg-bottom bg-cover" style="background-image: url({{ auth()->user()->avatar }}&headonly=1)"></div>
                <p>{{ auth()->user()->username }}</p>
                <x-icon.arrow />

                <x-slot:children>
                    @if (auth()->user()->rank >= $settings->get('min_housekeeping_rank'))
                        <x-dropdown.item href="{{ route('nova.pages.dashboard') }}" target="_blank">{{ __('Housekeeping') }}</x-dropdown.item>
                    @endif
                    <x-dropdown.item href="{{ route('users.settings.account.index') }}">{{ __('User settings') }}</x-dropdown.item>
                    <x-dropdown.item href="{{ route('logout') }}">{{ __('Logout') }}</x-dropdown.item>
                </x-slot:children>
            </x-dropdown.base>
        </div>
    </div>
</div>