<x-app-layout>
    <div class="col-span-12">
        <div class="grid grid-cols-1 gap-y-14">
            <div class="grid grid-cols-3 h-[220px] gap-x-8">
                <div class="col-span-1 h-full profile-bg rounded-lg relative flex gap-x-2 items-center text-white">
                    <img class="drop-shadow" style="image-rendering: pixelated;" src="{{ setting('avatar_imager') }}{{ $user->look }}&direction=2&head_direction=3&gesture=sml&action=wav&size=l" alt="">

                    <div class="flex flex-col">
                        <h3 class="text-xl font-semibold">{{ __('My name is,') }}</h3>
                        <h2 class="text-4xl font-bold">
                            {{ $user->username }}
                        </h2>

                        <h4 class="text-lg font-semibold italic">{{ $user->motto }}</h4>
                    </div>
                </div>

                <div class="col-span-2 grid grid-cols-3 w-full">
                    <div class="rounded-l-lg bg-[#f8ef2b] flex flex-col gap-y-2 items-center justify-center">
                        <img src="{{ asset('/assets/images/profile/credits.png') }}" alt="">

                        <h4 class="text-[#b16d18] font-bold text-2xl">
                            {{ $user->credits }}
                        </h4>
                    </div>

                    <div class="bg-[#e99bdc] flex flex-col gap-y-2 items-center justify-center">
                        <img src="{{ asset('/assets/images/profile/duckets.png') }}" alt="">

                        <h4 class="text-[#812378] font-bold text-2xl">
                            {{ $user->currency('duckets') }}
                        </h4>
                    </div>

                    <div class="rounded-r-lg bg-[#82d6db] flex flex-col gap-y-2 items-center justify-center">
                        <img src="{{ asset('/assets/images/profile/diamonds.png') }}" alt="">

                        <h4 class="text-[#146867] font-bold text-2xl">
                            {{ $user->currency('diamonds') }}
                        </h4>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-x-14">
                <div class="col-span-1 w-50 shadow-lg">
                    <img src="{{ asset('/assets/images/profile/badges.png') }}" alt="">

                    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
                        <h2 class="font-bold text-xl">{{ __('Badges') }}</h2>
                        <div class="grid grid-cols-5 gap-0.5">
                        @forelse($badges as $badge)
                            <img src="{{ setting('swf_folder') }}/c_images/album1584/{{ $badge->badge_code }}.gif" class="max-h-[40px] max-w-[40px]" alt="">
                        @empty
                            <div class="col-span-1">
                                It seems like {{ $user->username }} has no badges.
                            </div>
                        @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-span-1 w-50 shadow-lg">
                    <img src="{{ asset('/assets/images/profile/groups.png') }}" alt="">
                    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
                        <h2 class="font-bold text-xl">{{ __('Groups') }}</h2>

                        <div>
                            It seems like {{ $user->username }} is not a member of any groups.
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-x-14">
                <div class="col-span-1 w-50 shadow-lg">
                    <img src="{{ asset('/assets/images/profile/rooms.png') }}" alt="">
                    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
                        <h2 class="font-bold text-xl">{{ __('Rooms') }}</h2>
                        <div class="grid grid-cols-4 gap-0.5">
                            @forelse($rooms as $room)
                                <div class="flex h-[150px] w-[120px] flex-col gap-y-1 rounded-md bg-gray-200 p-1 overflow-hidden">
                                    <div class="h-full  bg-[#C3C3C3] rounded-md border border-gray-500 relative flex items-center justify-center flex-col">
                                        <img src="{{ setting('swf_folder') }}/c_images/camera/thumbnail/{{ $room->id }}.png" alt="{{ $room->name }}" onerror="this.onerror=null;this.src='{{ asset('/assets/images/profile/room_placeholder.png') }}';">

                                        <div class="px-1 py-[1px] -mt-3 font-bold bg-[#00800B] rounded flex gap-x-[3px] text-white items-center text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-[12px]" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $room->users }}
                                        </div>
                                    </div>

                                    <div class="flex justify-between items-center">
                                        <p class="truncate ...">{{ $room->name }}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-300 hover:text-cyan-400 mt-1 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-1">
                                    It seems like {{ $user->username }} got no rooms.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-span-1 w-50 shadow-lg">
                    <img src="{{ asset('/assets/images/profile/friends.png') }}" alt="">
                    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
                        <h2 class="font-bold text-xl">{{ __('Friends') }}</h2>
                        <div class="grid grid-cols-8"
                        @forelse($friends as $friend)
                            <img src="https://www.habbo.com/habbo-imaging/avatarimage?figure={{ $friend->look }}" alt="">
                        @empty
                            <div class="col-span-1">
                                It seems like {{ $user->username }} has no friends.
                            </div>
                        @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
