<header class="h-[70px] overflow-hidden">
    <div class="relative w-full h-full">
        <div class="absolute w-full h-full flex flex-col justify-center items-center p-4">
            @auth
            <div class="max-w-[1200px] w-full">
                <div class="flex justify-end pr-3">
                    <div class="relative">
                        <div class="max-[379.98px]:max-w-[150px] max-w-[200px] w-full bg-[var(--avatar)] border-2 border-[var(--avatar-border)] rounded shadow-[0_1px_0_2px_rgba(0,0,0,.3)] pl-2 pr-9 py-1 my-4">
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
                </div>
            </div>
            @endauth

            @guest
            <div class="max-w-[1200px] w-full">
                <div class="flex justify-end">
                    <a class="bg-[var(--avatar)] border-2 border-[var(--avatar-border)] rounded shadow-[0_1px_0_2px_rgba(0,0,0,.3)] px-4 py-1" href="{{ route('welcome') }}">
                        {{ __('Login') }}
                    </a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</header>
