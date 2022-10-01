<x-app-layout>
    @push('title', auth()->user()->username)

    <div class="col-span-12 md:col-span-9 space-y-3">
        <x-user.me-backdrop :user="$user" />

        <div class="grid grid-cols-4 gap-3">
            <x-currency-box primary-color="bg-yellow-300" secondary-color="bg-yellow-400">
                <x-slot:icon>
                    <img style="image-rendering: pixelated;" src="{{ asset('/assets/images/icons/credits.png') }}" alt="credits" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->credits }}
            </x-currency-box>

            <x-currency-box primary-color="bg-purple-300" secondary-color="bg-purple-400">
                <x-slot:icon>
                    <img style="image-rendering: pixelated;" src="{{ asset('/assets/images/icons/duckets.png') }}" alt="duckets" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->currency('duckets') }}
            </x-currency-box>

            <x-currency-box primary-color="bg-blue-300" secondary-color="bg-blue-400">
                <x-slot:icon>
                    <img src="{{ asset('/assets/images/icons/diamond.png') }}" alt="Diamonds" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->currency('diamonds') }}
            </x-currency-box>

            <x-currency-box primary-color="bg-gray-400" secondary-color="bg-gray-600">
                <x-slot:icon>
                    <img style="image-rendering: pixelated;" src="{{ asset('/assets/images/icons/rank.png') }}" alt="Rank" class="w-5 drop-shadow">
                </x-slot:icon>

                {{ $user->permission->rank_name ?? 'Unknown' }}
            </x-currency-box>
        </div>


        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ sprintf(__('User Referrals (%s/%s)'), auth()->user()->referrals->referrals_total ?? 0, setting('referrals_needed')) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Referral new users and be rewarded by in-game goods') }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200">
                {{ __('Here at :hotel we have added a referral system, allowing you to obtain a bonus for every :needed users that registers through your referral link will allow you to claim a reward of :amount diamonds!', ['hotel' => setting('hotel_name'), 'needed' => setting('referrals_needed'), 'amount' => setting('referral_reward_amount')]) }}
                <br>

                <small class="text-gray-400">
                    {{ __('Boosting referrals by making own accounts will lead to removal of all progress, currency, inventory and a potential ban') }}
                </small>

                <div class="grid grid-cols-12 gap-2">
                    <x-form.input classes="col-span-12 md:col-span-10 text-sm" name="referral" value="{{ sprintf('%s/register/%s/%s', env('APP_URL'), auth()->user()->username, auth()->user()->referral_code) }}" :autofocus="false" :readonly="true" />

                    <div class="col-span-12 md:col-span-2 flex" onclick="copyCode()">
                        <x-form.secondary-button>
                            {{ __('Copy code') }}
                        </x-form.secondary-button>
                    </div>

                </div>

                @if(auth()->user()->referrals?->referrals_total >= (int) setting('referrals_needed'))
                    <a href="{{ route('claim.referral-reward') }}" class="text-decoration-none">
                        <button class="mt-2 w-full rounded bg-green-600 text-white p-2">{{ __('Claim your referrals reward!') }}</button>
                    </a>
                @else
                    <button disabled class="mt-2 w-full rounded bg-gray-400 dark:bg-gray-900 text-white p-2">
                        {{ sprintf(__('You need to refer :needed more users, before being able to claim your reward', ['needed' => auth()->user()->referralsNeeded() ?? 0]), auth()->user()->referrals->referrals_total ?? 0) }}
                    </button>
                @endif
            </div>
        </x-content.content-section>
    </div>

    <div class="col-span-12 md:col-span-3 space-y-4">
        @if(!is_null($article))
            <x-article-card :article="$article"/>
        @endif

        <iframe src="https://discordapp.com/widget?id={{ setting('discord_widget_id') }}&theme=dark" title="Discord Widget" height="248px" allowtransparency="true" frameborder="0"></iframe>
    </div>

    @push('javascript')
        <script>
            function copyCode() {
                let copyText = document.querySelector('#referral');
                copyText.select();
                document.execCommand("copy");
            }
        </script>
    @endpush
</x-app-layout>
