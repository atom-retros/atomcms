@props(['user'])

<div class="rounded-lg h-24 bg-white border w-full overflow-hidden relative md:mt-0">
    <div class="absolute right-1 top-1 bg-white rounded px-2 text-sm font-bold">
        {{ $user->permission->rank_name }}
    </div>

    <div class="h-[65%] w-full staff-bg"></div>

    <div class="absolute top-4 drop-shadow left-1">
        <a href="#">
            <img class="transition ease-in-out duration-300 hover:scale-110" src="{{ setting('avatar_imager') }}{{ $user->look }}&direction=2&head_direction=3&gesture=sml&action=wav" alt="">
        </a>
    </div>

    <p class="text-2xl font-bold ml-[70px] text-white -mt-[35px]">
        {{ $user->username }}
    </p>

    <div class="w-full flex justify-between px-4 items-center">
        <p class="ml-[57px] text-sm mt-[10px] font-bold text-gray-500">
            {{ $user->motto }}
        </p>

        <div class="w-4 h-4 rounded-full mt-2 {{ $user->online ? 'bg-green-600' : 'bg-red-600' }}">

        </div>
    </div>
</div>