<header class="h-[342px] lg:h-[412px] overflow-hidden">
    <div class="relative w-full h-full">
        <div class="max-lg:hidden absolute w-full">
            <div class="max-w-[1300px] w-full mx-auto">
                <img class="ms-auto" style="image-rendering:pixelated" src="{{ Vite::asset('resources/images/hotel-large.png') }}" alt="">
            </div>
        </div>
        <div class="max-lg:hidden absolute w-full h-full backdrop-blur-[2px]"></div>
        <div class="absolute w-full h-full flex flex-col justify-center items-center p-4">
            <img class="anim:up-down" style="image-rendering:pixelated" src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
            @auth
            <div class="relative">
                <div class="max-w-[200px] w-full bg-[var(--avatar)] border-2 border-[var(--avatar-border)] rounded shadow-[0_1px_0_2px_rgba(0,0,0,.3)] pl-2 pr-9 py-1 my-4">
                    <a class="hover:underline truncate" href="{{ route('profile.show', ['user' => Auth::user()->username]) }}">{{ Auth::user()->username }}</a>
                </div>
                <div class="absolute top-[10px] right-[-16px]">
                    <div class="relative min-w-12 max-w-12 w-full min-h-12 max-h-12 h-full bg-[var(--avatar)] border-2 border-[var(--avatar-border)] rounded-full shadow-[0_1px_0_2px_rgba(0,0,0,.3)] overflow-hidden">
                        <img
                            class="absolute top-[-18px] object-cover h-[110px] w-[64px]"
                            style="image-rendering:pixelated"
                            src="{{ config('habbo.imager') . Auth::user()->look }}&direction=4"
                            alt=""
                        />
                    </div>
                </div>
            </div>
            <x-app.button.warning href="{{ route('nitro-client') }}">
                Hotel betreten
            </x-app.button.warning>
            <a class="font-semibold hover:text-gray-300 underline mt-2" href="{{ route('logout') }}">Abmelden</a>
            @endauth

            @guest
            <p class="max-w-[368px] text-center my-4">
                {{ __('An online virtual world where you can create your own avatar, make friends, chat, create rooms and much more!') }}
            </p>
            <div class="max-sm:w-full grid sm:flex gap-x-4 gap-y-2 p-4 pt-0">
                <x-app.button.info href="{{ route('login') }}">
                    {{ __('Login') }}
                </x-app.button.info>
                <x-app.button.success href="{{ route('register') }}">
                    {{ __('register') }}
                </x-app.button.info>
            </div>
            @endguest
        </div>
    </div>
</header>
