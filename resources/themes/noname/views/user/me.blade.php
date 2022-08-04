<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="col-span-12 md:col-span-9 flex flex-col gap-y-3">
        <div class="rounded-lg me-backdrop relative overflow-hidden flex justify-between px-10 items-center">
            <div>
                <a href="#" class="absolute left-0 drop-shadow -bottom-12 transition ease-in-out duration-300 hover:scale-105">
                    <img style="image-rendering: pixelated;" src="{{ setting('avatar_imager') }}{{ $user->look }}&direction=2&head_direction=3&gesture=sml&action=wav&size=l" alt="">
                </a>
            </div>

            <div>
                <button class="text-lg relative rounded-full py-2 px-6 bg-white bg-opacity-90 transition duration-300 ease-in-out hover:bg-opacity-100 text-black font-bold">
                    {{ __('Go to :hotel', ['hotel' => setting('hotel_name')]) }}
                </button>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-3">
            <x-currency-box primary-color="bg-yellow-300" secondary-color="bg-yellow-400">
                <x-slot:icon>
                    <img style="image-rendering: pixelated;" src="https://habstar.net/assets/images/icons/credits.png" alt="credits" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->credits }}
            </x-currency-box>

            <x-currency-box primary-color="bg-purple-300" secondary-color="bg-purple-400">
                <x-slot:icon>
                    <img style="image-rendering: pixelated;" src="https://habstar.net/assets/images/icons/duckets.png" alt="duckets" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->currency('duckets') }}
            </x-currency-box>

            <x-currency-box primary-color="bg-blue-300" secondary-color="bg-blue-400">
                <x-slot:icon>
                    <img src="https://habstar.net/assets/images/icons/diamond.png" alt="Diamonds" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->currency('diamonds') }}
            </x-currency-box>

            <x-currency-box primary-color="bg-gray-400" secondary-color="bg-gray-600">
                <x-slot:icon>
                    <img style="image-rendering: pixelated;" src="https://habstar.net/assets/images/icons/rank.png" alt="Rank" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->permission->rank_name }}
            </x-currency-box>
        </div>
    </div>

    <div class="col-span-12 md:col-span-3 shadow-lg rounded-lg transition ease-in-out duration-300 hover:scale-[102%]">
        <x-article-card :article="$article"/>
    </div>

    <div class="col-span-12 md:col-span-9">
        <x-content-section icon="hotel-icon">
            <x-slot:title>
                {{ __('User Referrals') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Referral new users and be rewarded by in-game goods') }}
            </x-slot:under-title>

            {{-- Content --}}
        </x-content-section>
    </div>
</x-app-layout>
