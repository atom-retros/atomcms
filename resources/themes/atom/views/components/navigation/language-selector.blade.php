<button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarLanguage"
    class="hidden font-semibold uppercase transition duration-200 ease-in-out md:mr-4 md:flex">
    {{ $slot }}
</button>

<!-- Dropdown menu -->
<div id="dropdownNavbarLanguage" class="z-10 block hidden w-14 bg-white py-2 font-normal shadow dark:bg-gray-800">
    @foreach (DB::table('website_languages')->get() as $lang)
        <a data-turbolinks="false" href="{{ route('language.select', $lang->country_code) }}"
            class="block px-4 py-2 font-semibold hover:bg-gray-100">
            <img src="/assets/images/icons/flags/{{ $lang->country_code }}.png" alt="Language">
        </a>
    @endforeach
</div>
