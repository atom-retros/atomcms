@props(['photo'])

<a href="{{ $photo->url }}" data-fancybox="gallery" class="cursor-pointer relative transition duration-300 ease-in-out hover:scale-[102%]">
    <div class="photo-overlay"></div>
    <img class="h-[250px] w-full object-cover object-center rounded-md custom-shadow" src="{{ $photo->url }}" alt="">

    <div class="absolute right-2 bottom-2 bg-black/70 p-2 rounded-md text-white flex gap-x-2 z-[5]">
        <img class="self-center" src="{{ asset('/assets/images/dusk/author_camera_icon.png') }}" alt="">
        <small>
            {{ $photo->user->username }}
        </small>
    </div>
</a>
