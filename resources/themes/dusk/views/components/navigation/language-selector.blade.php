<x-navigation.dropdown classes="!border-none" childClasses="w-[50px] -ml-2 flex items-center" :show-chevron="true" :flex-col="false">
    {{ $slot }}

    <x-slot:children>
        @foreach (DB::table('website_languages')->get() as $lang)
            <x-navigation.dropdown-child :route="route('language.select', $lang->country_code)" classes="transition ease-in-out duration-300 hover:scale-110 flex justify-center">
                <img src="/assets/images/icons/flags/{{ $lang->country_code }}.png" alt="{{ $lang->country_code }}">
            </x-navigation.dropdown-child>
        @endforeach
    </x-slot:children>
</x-navigation.dropdown>
