
<button
        id="dropdownNavbarLink"
        data-dropdown-toggle="dropdownNavbarLanguage"
        class="ml-5 md:ml-0 transition ease-in-out duration-200 hidden md:flex uppercase font-bold">
    {{ $slot }}
</button>

<!-- Dropdown menu -->
<div id="dropdownNavbarLanguage" class="py-2 hidden z-10 w-14 font-normal bg-white shadow block">
    @foreach(DB::table('website_languages')->get() as $lang)
        <a href="{{ route('language.select', $lang->country_code) }}" class="block py-2 px-4 hover:bg-gray-100 font-bold">
            <img src="/assets/images/icons/flags/{{ $lang->country_code }}.png" alt="">
        </a>
    @endforeach
</div>

