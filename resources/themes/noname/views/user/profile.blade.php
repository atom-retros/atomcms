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

                        <h4 class="text-lg font-semibold">{{ __('Motto:') }} {{ $user->motto }}</h4>
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
                <div class="col-span-1 w-full">
                    <img src="{{ asset('/assets/images/profile/badges.png') }}" alt="">

                    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
                        <h2 class="font-bold text-xl">{{ __('Badges') }}</h2>

                        <div>
                            It seems like {{ $user->username }} has no badges
                        </div>
                    </div>
                </div>

                <div class="col-span-1 w-full">
                    <img src="{{ asset('/assets/images/profile/groups.png') }}" alt="">
                    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
                        <h2 class="font-bold text-xl">{{ __('Groups') }}</h2>

                        <div>
                            It seems like {{ $user->username }} is not a member of any groups
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-x-14">
                <div class="col-span-1 w-full">
                    <img src="{{ asset('/assets/images/profile/rooms.png') }}" alt="">
                    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
                        <h2 class="font-bold text-xl">{{ __('Rooms') }}</h2>

                        <div>
                            It seems like {{ $user->username }} got no rooms
                        </div>
                    </div>
                </div>

                <div class="col-span-1 w-full">
                    <img src="{{ asset('/assets/images/profile/friends.png') }}" alt="">
                    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
                        <h2 class="font-bold text-xl">{{ __('Friends') }}</h2>

                        <div>
                            It seems like {{ $user->username }} has no friends
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
