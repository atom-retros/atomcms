<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="col-span-12 md:col-span-8 flex flex-col gap-y-3">
        <div class="bg-gray-200 p-4">
            This is my user view
        </div>

        <div class="grid grid-cols-4 gap-3">
            <div class="flex h-[45px]">
                <div class="w-1/3 bg-yellow-400 rounded-l-lg flex items-center justify-center">
                    <img src="https://habstar.net/assets/images/icons/credits.png" alt="credits" class="w-5 drop-shadow">
                </div>
                <div class="p-2 rounded-lg rounded-l-none bg-yellow-300 w-2/3 font-bold flex justify-center items-center">{{ $user->credits }}</div>
            </div>

            <div class="flex h-[45px]">
                <div class="w-1/3 bg-purple-400 rounded-l-lg flex items-center justify-center">
                    <img src="https://habstar.net/assets/images/icons/duckets.png" alt="duckets" class="w-5 drop-shadow">
                </div>
                <div class="p-2 rounded-lg rounded-l-none bg-purple-300 w-2/3 font-bold flex justify-center items-center">{{ $user->currency('duckets') }}</div>
            </div>

            <div class="flex h-[45px]">
                <div class="w-1/3 bg-blue-400 rounded-l-lg flex items-center justify-center">
                    <img src="https://habstar.net/assets/images/icons/diamond.png" alt="Diamonds" class="w-5 drop-shadow">
                </div>
                <div class="p-2 rounded-lg rounded-l-none bg-blue-300 w-2/3 font-bold flex justify-center items-center">{{ $user->currency('diamonds') }}</div>
            </div>

            <div class="flex h-[45px]">
                <div class="w-1/3 bg-gray-600 rounded-l-lg flex items-center justify-center">
                    <img src="https://habstar.net/assets/images/icons/rank.png" alt="Rank" class="w-5 drop-shadow">
                </div>
                <div class="p-2 rounded-lg rounded-l-none bg-gray-400 w-2/3 font-bold flex justify-center items-center">{{ $user->permission->rank_name }}</div>
            </div>
        </div>
    </div>

    <div class="col-span-12 md:col-span-4 bg-gray-200 p-2">
        This is my article
    </div>

    <div class="col-span-12 md:col-span-8 bg-gray-200 p-2">
        This is my referral
    </div>
</x-app-layout>
