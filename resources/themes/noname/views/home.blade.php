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
            <x-currency-box primary-color="bg-yellow-300" secondary-color="bg-yellow-400">
                <x-slot:icon>
                    <img src="https://habstar.net/assets/images/icons/credits.png" alt="credits" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->credits }}
            </x-currency-box>
            
            <x-currency-box primary-color="bg-purple-300" secondary-color="bg-purple-400">
                <x-slot:icon>
                    <img src="https://habstar.net/assets/images/icons/duckets.png" alt="duckets" class="w-5 drop-shadow">
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
                    <img src="https://habstar.net/assets/images/icons/rank.png" alt="Rank" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->permission->rank_name }}
            </x-currency-box>
        </div>
    </div>

    <div class="col-span-12 md:col-span-4 bg-gray-200 p-2">
        This is my article
    </div>

    <div class="col-span-12 md:col-span-8 bg-gray-200 p-2">
        This is my referral
    </div>
</x-app-layout>
