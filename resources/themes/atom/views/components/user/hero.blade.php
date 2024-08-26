<div class="relative overflow-hidden rounded h-[180px]" style="background-image: url({{ asset('images/kasja_mepage_image.png') }})">
    <div class="flex items-center justify-between w-full h-full px-3 bg-black/30">
        <a href="{{ route('profiles', auth()->user()) }}">
            <img src="{{ auth()->user()->avatar }}&direction=2&head_direction=3&gesture=sml&action=wav&size=l" alt="{{ auth()->user()->username }}" class="relative transition-all duration-300 top-7 hover:scale-105 drop-shadow image-rendering-pixelated" />
        </a>

        <div class="flex items-center justify-end flex-1">
            <a href="{{ route('game.nitro') }}">
                <button class="relative px-6 py-2 text-lg font-semibold text-black transition duration-300 ease-in-out bg-white rounded-full bg-opacity-90 hover:bg-opacity-100 dark:bg-gray-900 dark:text-white">
                    {{ __('Go to :hotel', ['hotel' => $settings->get('hotel_name')]) }}
                </button>
            </a>
        </div>
    </div>
</div>