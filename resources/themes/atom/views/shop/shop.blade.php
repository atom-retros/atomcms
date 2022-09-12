<x-app-layout>
    @push('title', __('Shop'))

    <div class="col-span-12">
        <div class="w-full rounded bg-red-600 p-4 text-white text-sm text-center">
            {{ __('Here at :hotel we have some terms, that you must read before making a purchase. Once you make a purchases you automatically accept our given terms.', ['hotel' => setting('hotel_name')]) }}
            <a href="#" target="_blank" class="underline">{{ __('Shop terms') }}</a>
        </div>
    </div>

    <div class="col-span-12 md:col-span-9">
        <div class="flex flex-col gap-y-3">
            <x-shop.packages />
        </div>
    </div>

    <div class="col-span-12 md:col-span-3 flex flex-col gap-y-3">
        <x-content-section icon="hotel-icon" classes="border">
            <x-slot:title>
                {{ __(':hotel Shop', ['hotel' => setting('hotel_name')]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Purchase :hotel items', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <small>
                {{ __('Please read our shop terms before making a purchase here at :hotel. We consider all purchases a donation, and we will in no circumstances issue a refund.', ['hotel' => setting('hotel_name')]) }}
            </small>

            <div>
                Current balance:
                <strong> $<span id="balance">{{ auth()->user()->website_store_balance }}</span></strong>
            </div>

            <div class="flex flex-col">
                <x-form.label for="fillupAmount">
                    {{ __('Top up') }}
                </x-form.label>

                <x-form.input name="fillupAmount" placeholder="Enter top up amount" :autofocus="true" />
            </div>

            @if (Auth::check())
                <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
                <div id="paypal-button-container"></div>
            @endif


{{--            <p>--}}
{{--                {{ __('Here at :hotel Hotel we are accepting donations to keep the hotel up & running and as a thank you, you will in return receive in-game goods.', ['hotel' => setting('hotel_name')]) }}--}}
{{--            </p>--}}


{{--            <p>--}}
{{--                <span class="font-semibold">{{ __('Why are donations important?') }}</span><br>--}}
{{--                {{ __('Donations are important, as it will help to pay our monthly bills needed to keep the hotel up & running, as well as adding new and exciting features for you and others to enjoy!') }}--}}
{{--            </p>--}}

{{--            <p class="font-semibold italic">--}}
{{--                {{ __('To purchase items from the :hotel shop, please visit our Discord and contact the owner of :hotel Hotel to make your purchase', ['hotel' => setting('hotel_name')]) }}--}}
{{--            </p>--}}

{{--            <a href="{{ setting('discord_invitation_link') }}" target="_blank">--}}
{{--                <x-form.secondary-button>--}}
{{--                    {{ __('Take me to the :hotel Discord', ['hotel' => setting('hotel_name')]) }}--}}
{{--                </x-form.secondary-button>--}}
{{--            </a>--}}
        </x-content-section>

        @auth
            <x-content-section icon="hotel-icon" classes="border">
                <x-slot:title>
                    {{ __('Redeem voucher') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Redeem your voucher') }}
                </x-slot:under-title>

                <small>
                    {{ __('Enter a shop voucher to fill up your store balance', ['hotel' => setting('hotel_name')]) }}
                </small>

                <form action="{{ route('shop.redeem-voucher') }}" method="POST" class="flex flex-col gap-y-3">
                    @csrf

                   <div class="w-full flex flex-col">
                       <x-form.label for="code">
                           {{ __('Voucher') }}
                       </x-form.label>

                       <x-form.input name="code" placeholder="{{ __('Enter your shop voucher') }}" />
                   </div>

                    <x-form.primary-button>
                        {{ __('Redeem') }}
                    </x-form.primary-button>
                </form>
            </x-content-section>
        @endauth
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
    @push('javascript')
        <script>
            window.addEventListener('load', () => {
                paypal.Buttons({
                    createOrder: function (data, actions) {
                        return fetch('{{ route("paypal.create") }}', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json'
                            },
                            body: JSON.stringify({
                                api_token: '{{ auth()->user()->paypal_api_token }}',
                                value: document.querySelector('#fillupAmount').value,
                            })
                        }).then(function (res) {
                            let json = res.json();

                            return json;
                        }).then(function (data) {
                            return data.id;
                        });
                    },

                    onApprove: function (data, actions) {
                        return fetch('{{ route("paypal.capture") }}', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json'
                            },
                            body: JSON.stringify({
                                orderID: data.orderID
                            })
                        }).then(function (res) {
                            return res.json();
                        }).then(function (details) {
                            paymentConfirmation(details);
                        });
                    }
                }).render('#paypal-button-container');
            });

            function paymentConfirmation(details) {
                Swal.fire(
                    'Thank you for your purchase!',
                    'Your balance has been topped up with $' + parseInt(details.purchase_units[0].payments.captures[0].amount.value),
                    'success'
                )

                const balance = parseInt(document.querySelector('#balance').innerHTML);
                if(balance === 0) {
                    document.querySelector('#balance').innerHTML = parseInt(details.purchase_units[0].payments.captures[0].amount.value)

                    return;
                }

                document.querySelector('#balance').innerHTML = parseInt(details.purchase_units[0].payments.captures[0].amount.value) + balance;
            }
        </script>
    @endpush
</x-app-layout>