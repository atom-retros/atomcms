<x-navigation.dropdown classes="!border-none -ml-4 hidden lg:block" childClasses="ml-4 min-w-[50px] mt-1">
    {{ $slot }}

    <x-slot:children>
        @foreach (DB::table('website_languages')->get() as $lang)
            <x-navigation.dropdown-child :route="route('language.select', $lang->country_code)" :turbolink="false">
                <img src="/assets/images/icons/flags/{{ $lang->country_code }}.png" alt="{{ $lang->country_code }}">
            </x-navigation.dropdown-child>
        @endforeach
    </x-slot:children>
</x-navigation.dropdown>
