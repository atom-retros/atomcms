@props(['user'])


<div class="rounded me-backdrop relative overflow-hidden flex justify-between px-10 items-center" style="background: rgba(0, 0, 0, 0.3) url({{ setting('cms_me_backdrop') }});">
    <div>
        <a href="{{ route('profile.show', $user) }}"
           class="absolute left-0 drop-shadow -bottom-12 transition ease-in-out duration-300 hover:scale-105">
            <img style="image-rendering: pixelated;"
                 src="{{ setting('avatar_imager') }}{{ $user->look }}&direction=2&head_direction=3&gesture=sml&action=wav&size=l"
                 alt="">
        </a>
    </div>

    <a data-turbolinks="false" href="{{ route('nitro-client') }}">
        <button class="text-lg relative rounded-full py-2 dark:bg-gray-900 dark:text-white px-6 bg-white bg-opacity-90 transition duration-300 ease-in-out hover:bg-opacity-100 text-black font-semibold">
            {{ __('Go to :hotel', ['hotel' => setting('hotel_name')]) }}
        </button>
    </a>
</div>
