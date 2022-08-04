<div class="w-full h-52 bg-blue-400 relative flex items-center justify-center header-bg">
    <div class="w-full h-full bg-black absolute bg-opacity-50"></div>

    @auth
        <div class="max-w-7xl relative h-full w-full flex items-center justify-center md:justify-between pr-10">
            <a href="{{ route('me.show') }}" class="ml-7">
                <img class="drop-shadow transition ease-in-out duration-300 hover:scale-105" src="https://habbofont.net/font/habbo_new_big/{{ setting('hotel_name') }}.gif" alt="Hotel logo">
            </a>

            <button class="hidden md:block text-lg relative rounded-full py-2 px-6 bg-white bg-opacity-90 transition duration-300 ease-in-out hover:bg-opacity-100 text-black font-bold">
                Go to Hotel
            </button>
        </div>
    @endauth

    @guest
        <div class="text-white relative font-bold flex-col w-[600px]">
            <p class="text-center text-xl">
                Online virtual community where you can create your own avatar, make friends, chat, create rooms and much more!
            </p>

            {{-- TODO: Figure something out in regards to login & reg --}}
            <div class="uppercase flex justify-center items-center gap-x-6 mt-6">
                <a href="{{ route('login') }}">
                    <button class="uppercase border-2 border-white px-8 py-2 rounded-full transition ease-in-out duration-200 hover:bg-white hover:text-black">Login</button>
                </a>
                <p class="text-opacity-80 text-sm uppercase">Or</p>
                <a href="{{ route('register') }}">
                    <button class="uppercase bg-green-600 bg-opacity-80 px-8 py-2.5 rounded-full transition ease-in-out duration-200 hover:bg-opacity-100">Create account</button>
                </a>
            </div>
        </div>
    @endguest
</div>