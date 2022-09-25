<x-app-layout>
    @push('title', __('Shop'))

    <div class="col-span-12 md:col-span-9">
        <div class="flex flex-col gap-y-3 dark:text-gray-300">
            <x-shop.packages />
        </div>
    </div>

    <div class="col-span-12 md:col-span-3 flex flex-col gap-y-3">
        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __(':hotel Shop', ['hotel' => setting('hotel_name')]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Purchase :hotel items', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="space-y-4 text-[14px] dark:text-gray-300">
                <p>
                    {{ __('Here at :hotel Hotel we are accepting donations to keep the hotel up & running and as a thank you, you will in return receive in-game goods.', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    <span class="font-semibold">{{ __('Why are donations important?') }}</span><br>
                    {{ __('Donations are important, as it will help to pay our monthly bills needed to keep the hotel up & running, as well as adding new and exciting features for you and others to enjoy!') }}
                </p>

                <p class="font-semibold italic">
                    {{ __('To purchase items from the :hotel shop, please visit our Discord and contact the owner of :hotel Hotel to make your purchase', ['hotel' => setting('hotel_name')]) }}
                </p>

               <div class="mt-4">
                    <a href="{{ setting('discord_invitation_link') }}" target="_blank">
                        <x-form.secondary-button>
                            {{ __('Take me to the :hotel Discord', ['hotel' => setting('hotel_name')]) }}
                        </x-form.secondary-button>
                    </a>
               </div>
            </div>
        </x-content.content-section>
    </div>

    <style>
        .bronze-vip {
            background: #c5630f url({{ sprintf('%s/VipParties2.gif', setting('badges_path')) }}) no-repeat center;
        }

        .silver-vip {
            background: #dddddd url({{ sprintf('%s/VipParties2_Top100.gif', setting('badges_path')) }}) no-repeat center;
        }

        .gold-vip {
            background: #E4A317FF url({{ sprintf('%s/VipParties2_Top10.gif', setting('badges_path')) }}) no-repeat center;
        }
    </style>
</x-app-layout>
