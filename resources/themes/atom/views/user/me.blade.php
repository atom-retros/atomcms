<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="col-span-12 md:col-span-9 flex flex-col gap-y-3">
        <div class="rounded-lg me-backdrop relative overflow-hidden flex justify-between px-10 items-center">
            <div>
                <a href="{{ route('profile.show', $user) }}" class="absolute left-0 drop-shadow -bottom-12 transition ease-in-out duration-300 hover:scale-105">
                    <img style="image-rendering: pixelated;" src="{{ setting('avatar_imager') }}{{ $user->look }}&direction=2&head_direction=3&gesture=sml&action=wav&size=l" alt="">
                </a>
            </div>

            <a href="{{ route('nitro-client') }}">
                <button class="text-lg relative rounded-full py-2 px-6 bg-white bg-opacity-90 transition duration-300 ease-in-out hover:bg-opacity-100 text-black font-semibold">
                    {{ __('Go to :hotel', ['hotel' => setting('hotel_name')]) }}
                </button>
            </a>
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

        <div class="shadow p-3 rounded-lg">
            <x-content-section icon="hotel-icon">
                <x-slot:title>
                    {{ sprintf(__('User Referrals (%s/%s)'), auth()->user()->referrals->referrals_total ?? 0, setting('referrals_needed')) }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Referral new users and be rewarded by in-game goods') }}
                </x-slot:under-title>

                <div class="px-2 text-sm">
                    {{ __('Here at :hotel we have added a referral system, allowing you to obtain a bonus for every :needed users that registers through your referral link will allow you to claim a reward of :amount diamonds!', ['hotel' => setting('hotel_name'), 'needed' => setting('referrals_needed'), 'amount' => setting('referral_reward_amount')]) }}
                    <br>

                    <small style="color: gray;">
                        {{ __('Boosting referrals by making own accounts will lead to removal of all progress, currency, inventory and a potential ban') }}
                    </small>

                    <div class="grid grid-cols-12 gap-2">
                        <x-form.input classes="col-span-12 md:col-span-10" name="referral" value="{{ sprintf('%s/register/%s/%s', env('APP_URL'), auth()->user()->username, auth()->user()->referral_code) }}" :autofocus="false" :readonly="true" />

                        <div class="col-span-12 md:col-span-2 flex" onclick="copyCode()">
                            <x-form.secondary-button>
                                {{ __('Copy code') }}
                            </x-form.secondary-button>
                        </div>

                    </div>

                    @if(auth()->user()->referrals?->referrals_total >= (int) setting('referrals_needed'))
                        <a href="{{ route('claim.referral-reward') }}" class="text-decoration-none">
                            <button class="mt-2 w-full rounded-md bg-green-600 text-white p-2">{{ __('Claim your referrals reward!') }}</button>
                        </a>
                    @else
                        <button disabled class="mt-2 w-full rounded-md bg-gray-400 text-white p-2">
                            {{ sprintf(__('You need to refer :needed more users, before being able to claim your reward', ['needed' => auth()->user()->referralsNeeded() ?? 0]), auth()->user()->referrals->referrals_total ?? 0) }}
                        </button>
                    @endif
                </div>
            </x-content-section>
        </div>
    </div>

    <div class="col-span-12 md:col-span-3 space-y-4">
        <div class="shadow-lg rounded-lg transition ease-in-out duration-300 hover:scale-[102%]">
            <x-article-card :article="$article"/>
        </div>

        <iframe src="https://discordapp.com/widget?id={{ setting('discord_widget_id') }}&theme=dark" title="Discord Widget" height="248px" allowtransparency="true" frameborder="0"></iframe>
    </div>

    <script>
        function copyCode() {
            let copyText = document.querySelector('#referral');
            copyText.select();
            document.execCommand("copy");
        }
    </script>
</x-app-layout>
