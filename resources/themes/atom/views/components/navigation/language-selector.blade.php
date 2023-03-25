<x-navigation.dropdown classes="!border-none -ml-4 hidden lg:block" childClasses="ml-4 min-w-[50px] mt-1">
    {{ $slot }}

    <x-slot:children>
        @foreach (DB::table('website_languages')->get() as $lang)
            <a data-turbolinks="false" href="{{ route('language.select', $lang->country_code) }}"
               class="block px-4 py-2 font-semibold hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                <img src="/assets/images/icons/flags/{{ $lang->country_code }}.png" alt="">
            </a>
        @endforeach
    </x-slot:children>
</x-navigation.dropdown>
