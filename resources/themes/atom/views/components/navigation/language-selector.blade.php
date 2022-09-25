
<button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbarLanguage"
        class="md:mr-4 transition ease-in-out duration-200 hidden md:flex uppercase font-semibold">
    {{ $slot }}
</button>

<!-- Dropdown menu -->
<div id="dropdownNavbarLanguage" class="py-2 hidden z-10 w-14 font-normal bg-white shadow block dark:bg-gray-800">
    @foreach(DB::table('website_languages')->get() as $lang)
        <a href="{{ route('language.select', $lang->country_code) }}" class="block py-2 px-4 hover:bg-gray-100 font-semibold">
            <img src="/assets/images/icons/flags/{{ $lang->country_code }}.png" alt="">
        </a>
    @endforeach
</div>

