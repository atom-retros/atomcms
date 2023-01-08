@props(['photos'])

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
    @foreach($photos as $photo)
        <a
                href="{{ $photo->url }}"
                data-fancybox="gallery"
                class="cursor-pointer"
        >
            <div class="rounded border-2 dark:border-gray-600 h-[280px] relative object-fill overflow-hidden">
                <img class="object-cover object-center w-full h-full" src="{{ $photo->url }}" alt="">
                <div class="absolute bg-white rounded-full dark:bg-gray-800 bottom-3 left-4 pr-3 flex items-center gap-x-3">
                    <div class="w-10 h-10 bg-gray-100 dark:bg-gray-900 rounded-full flex items-center justify-center overflow-hidden">
                        <img src="{{ setting('avatar_imager') }}{{ $photo->user->look ?? '' }}&direction=2&headonly=1&head_direction=2&gesture=sml"
                             alt="">
                    </div>

                    <p class="dark:text-white">
                        {{ $photo->user->username ?? 'Unknown' }}
                    </p>
                </div>
            </div>
        </a>
    @endforeach
</div>