<x-app-layout>
    @push('title', auth()->user()->username)

    <div class="col-span-12 md:col-span-9 space-y-3">
        <x-user.me-backdrop :user="$user" />

        <div class="flex justify-between flex-col p-1 lg:flex-row gap-3 bg-white dark:bg-gray-800 border dark:border-gray-900 rounded shadow">
            <div class="py-2 px-2 relative flex justify-center items-center rounded text-sm font-semibold dark:text-gray-300 bg-[#e9b124] dark:border-gray-700">
                <div class="absolute bg-[#e9b124] w-6 h-6 -right-1 rotate-45 invisible lg:visible"></div>
                <img src="{{ asset('/assets/images/icons/online-friends.png') }}" alt="{{ __('Online Friends') }}" class="inline-flex mr-2 mb-1" style="max-width: 24px; max-height: 24px">
                <span class="relative text-white h-100">{{ __('Online Friends') }}</span>
            </div>
            <div class="flex-1 pl-2 h-100 flex relative justify-center sm:justify-start items-center gap-2">
                @foreach ($onlineFriends as $friend)
                    <div data-popover-target="friend-{{ $friend->username }}" style="image-rendering: pixelated; background-image: url({{ setting('avatar_imager') }}{{ $friend->look }}&direction=2&head_direction=3&gesture=sml&action=wav&headonly=1&size=s)"
                        class="inline-block w-10 h-10 bg-center bg-no-repeat rounded-full border-2 border-gray-300 dark:border-gray-900"></div>

                    <div data-popover id="friend-{{ $friend->username }}" role="tooltip" class="inline-block absolute invisible z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
                            <div class="font-semibold text-gray-900 dark:text-white flex justify-center items-center w-full">
                                {{ $friend->username }}
                            </div>
                        </div>
                        <div class="py-2 px-3 overflow-y-auto" style="max-height: 200px">
                            <b class="mr-1 font-bold">{{ __('Mission') }}:</b>{{ $friend->motto }}<br>
                            <b class="mr-1 font-bold">{{ __('Online Since') }}:</b>{{ date(config('habbo.site.date_format'), $friend->last_online) }}
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                @endforeach
            </div>
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
        <div class="relative w-full" style="height: 242px">
            @if(!$articles->isEmpty())
            <div class="swiper articles-slider relative">
                <div class="swiper-wrapper">
                    @foreach ($articles as $article)
                        <x-article-card :for-slider="true" :article="$article"/>
                    @endforeach
                </div>
            </div>
            <div class="swiper-pagination" style="bottom: 0px !important; z-index: 0;"></div>
            @endif
        </div>

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
