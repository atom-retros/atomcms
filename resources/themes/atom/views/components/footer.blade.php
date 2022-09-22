<footer
    class="w-full h-14 bg-gray-100 mt-auto flex flex-col justify-center md:flex-row md:justify-center text-gray-400 items-center md:px-8 text-sm" onclick="showFooter()">
    <div class="md:font-semibold text-[12px] md:text-[14px] cursor-pointer hover:underline">
        &copy {{ date('Y') }} -
        {{ __(':hotel is a not for profit educational project', ['hotel' => setting('hotel_name')]) }}
    </div>
</footer>

<script>
    function showFooter() {
        Swal.fire(
            '<span class="text-[26px]">{{ setting('hotel_name') }}</span>',
            '<span class="text-sm">{{ __('Thank you for playing :hotel. We have put a lot of effort into making the hotel what it is, and we truly appreciate you being here❤️', ['hotel' => setting('hotel_name')]) }}</span><br/><br/>  <span class="text-sm">{{ __(':hotel is driven by Atom CMS made by:', ['hotel' => setting('hotel_name')]) }} <a class="text-blue-400 underline" href="https://devbest.com/threads/atom-cms-a-multi-theme-cms.93034/" target="_blank">Object</a></span>',
            'question'
        )
    }
</script>
