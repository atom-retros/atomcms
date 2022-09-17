<footer class="w-full h-14 bg-gray-100 mt-auto flex flex-col justify-center md:flex-row md:justify-between text-gray-400 items-center md:px-8 text-sm">
    <div class="md:font-semibold text-[12px] md:text-[14px]">
        &copy {{ date('Y') }} - {{ __(':hotel is a not for profit educational project', ['hotel' => setting('hotel_name')]) }}
    </div>
    <div class="flex gap-x-1">
        {{ __('Atom CMS. Made with') }}

        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700 animate-pulse" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
        </svg>

        {{ __('By') }} <a href="https://devbest.com/members/object.78351/" target="_blank" class="font-semibold underline transition ease-in-out duration-150 hover:scale-105">Object</a></div>
</footer>