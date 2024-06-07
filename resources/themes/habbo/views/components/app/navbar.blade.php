<nav class="z-30 h-[70px] bg-[#e6f0f5] shadow-sm">
    @if(!request()->is('/'))
        <img class="max-md:hidden absolute left-[50%] translate-x-[-50%] top-[5px]" style="image-rendering:pixelated" src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
        <img class="md:hidden absolute left-3 top-[13px]" style="image-rendering:pixelated" src="{{ Vite::asset('resources/images/logo-small.png') }}" alt="">
    @endif

    <div x-data="{ open: false }" class="max-md:relative md:h-full md:flex md:justify-center md:items-center">
        <ul class="max-md:hidden navigation flex gap-6 overflow-x-auto overflow-y-hidden">
            <li>
                <a class="home text-2xl uppercase" href="{{ route('welcome') }}">Start</a>
            </li>
            <li>
                <a class="community text-2xl uppercase" href="{{ route('photos.index') }}">Community</a>
            </li>
        </ul>

        <button @click="open = !open" class="md:hidden absolute right-5 top-[23.33px] text-black focus:outline-none">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path x-show="!open" d="M4 6h16M4 12h16m-16 6h16"></path>
                <path x-show="open" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <div class="md:hidden pt-[70px]">
            <div x-show="open" @click.outside="open = false" x-bind:style="open && { opacity: 1 }" class="opacity-0 z-50 bg-[#e6f0f5] shadow-[0_3px_rgba(0,0,0,.3)] flex justify-center px-4 py-6 overflow-auto">
                <ul class="navigation flex flex-col gap-4 overflow-x-auto overflow-y-auto">
                    <li>
                        <a class="home text-2xl uppercase" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li>
                        <a class="community text-2xl uppercase" href="{{ route('photos.index') }}">Community</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
