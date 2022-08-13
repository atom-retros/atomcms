<x-app-layout>
    @push('title', __('Shop'))

    <div class="col-span-12 md:col-span-9">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <x-shop.packages />
        </div>
    </div>

    <div class="col-span-12 md:col-span-3 flex flex-col gap-y-3">
        <div class="shadow p-3 rounded-lg">
            <x-content-section icon="hotel-icon">
                <x-slot:title>
                    {{ __(':hotel Shop', ['hotel' => setting('hotel_name')]) }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Purchase :hotel items', ['hotel' => setting('hotel_name')]) }}
                </x-slot:under-title>

                <p>
                    {{ __('Here at :hotel Hotel we are accepting donations to keep the hotel up & running and as a thank you, you will in return receive in-game goods.', ['hotel' => setting('hotel_name')]) }}
                </p>


                <p>
                    <span class="font-bold">{{ __('Why are donations important?') }}</span><br>
                    {{ __('Donations are important, as it will help to pay our monthly bills needed to keep the hotel up & running, as well as adding new and exciting features for you and others to enjoy!') }}
                </p>

                <p class="font-semibold italic">
                    {{ __('To purchase items from the :hotel shop, please visit our Discord and contact the owner of :hotel Hotel to make your purchase', ['hotel' => setting('hotel_name')]) }}
                </p>

                <a href="{{ setting('discord_invitation_link') }}" target="_blank">
                    <x-form.secondary-button>
                        {{ __('Take me to the :hotel Discord', ['hotel' => setting('hotel_name')]) }}
                    </x-form.secondary-button>
                </a>
            </x-content-section>
        </div>
    </div>

    <style>
        .bronze-vip {
            background: #c5630f url({{ sprintf('%s/c_images/album1584/BVIP.gif', config('habbo.site.swf_path')) }}) no-repeat center;
        }

        .silver-vip {
            background: #dddddd url({{ sprintf('%s/c_images/album1584/SVIP.gif', config('habbo.site.swf_path')) }}) no-repeat center;
        }

        .gold-vip {
            background: #E4A317FF url({{ sprintf('%s/c_images/album1584/GVIP.gif', config('habbo.site.swf_path')) }}) no-repeat center;
        }
    </style>
</x-app-layout>