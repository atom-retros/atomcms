@props(['user'])

<div class="relative col-span-3 md:col-span-1 h-[150px] lg:h-[220px] rounded-lg relative text-white overflow-hidden" style="background-image: url({{ asset('images/profile-bg.png') }})">
    <div class="flex items-center w-full h-full gap-x-2 bg-black/50">
        <img src="{{ $user->avatar }}&direction=2&head_direction=3&gesture=sml&action=wav&size=l" alt="" class="mt-14 drop-shadow image-rendering-pixelated lg:mt-0">
        <div class="flex flex-col">
            <h3 class="text-xl font-semibold">{{ __('My name is,') }}</h3>
            <h2 class="text-4xl">{{ $user->username  }}</h2>
            <h4 class="text-lg italic font-semibold">{{ $user->motto }}</h4>
        </div>
    </div>
</div>
