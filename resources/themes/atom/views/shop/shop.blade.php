<x-app-layout>
    @push('title', __('Shop'))

    <div class="col-span-12">
        <x-modals.modal-wrapper>
            <div class="w-full py-2 px-4 text-center bg-[#f68b08] text-white rounded">
                {{ __('Please make sure to read our shop') }}
                <button class="text-white underline font-bold" x-on:click="open = true">{{ __('Terms & Conditions') }}</button>
                {{ __('before making a purchase') }}
            </div>

            <x-modals.regular-modal>
                <x-slot name="title">
                    <h2 class="text-2xl">
                        {{ __('Shop Terms & Conditions') }}
                    </h2>
                </x-slot>

                <div class="space-y-3 p-2">
                    <p>
                        {{ __('Here at Habbo Hotel we are accepting donations to keep the hotel up & running and as a thank you, you will in return receive in-game goods.') }}
                    </p>

                    <div class="flex flex-col gap-y-2 !mt-6">
                        <p class="font-semibold">{{ __('Why are donations important?') }}</p>

                        <p>{{ __('Donations are important, as it will help to pay our monthly bills needed to keep the hotel up & running, as well as adding new and exciting features for you and others to enjoy!') }}</p>
                    </div>

                    <div class="flex flex-col gap-y-2 !mt-6">
                        <p class="font-semibold">{{ __('Our terms') }}</p>

                        <p>{{ __('Once a donation has been made and received by us, it is non-refundable under any circumstances. The donated amount which is converted into website balance cannot be converted back into cash or other forms of money. By making a donation, you acknowledge and accept these terms and agree not to initiate a chargeback or dispute with your bank or card issuer.') }}</p>
                    </div>

                    <div class="flex flex-col gap-y-2 !mt-6">
                        <p class="font-semibold">{{ __('Notice') }}</p>

                        <p>{{ __('It is important to consider the consequences of our spending habits, especially when it comes to financial decisions. If you find yourself tempted to spend money you do not have, take a moment to reflect.') }}</p>
                        <p>{{ __('Remember, your financial well-being is crucial, and making responsible choices is key. If you are facing difficulties in controlling your spending habits, do not hesitate to seek friendly and professional guidance. There are resources available that can provide valuable advice and support.') }}</p>
                        <p>{{ __('Reaching out for help is a sign of strength and a positive step towards improving your financial situation. You are not alone in this journey, and there are people who genuinely want to assist you in managing your finances effectively.') }}</p>
                        <p>{{ __('You deserve financial stability and peace of mind. By seeking guidance, you are taking control and empowering yourself to make better choices. Start today and pave the way for a brighter financial future.') }}</p>
                    </div>
                </div>
            </x-modals.regular-modal>
        </x-modals.modal-wrapper>
    </div>

    <div class="col-span-12 md:col-span-7 lg:col-span-8 xl:col-span-9">
        <div class="flex flex-col gap-y-2 dark:text-gray-300">
            @foreach ($articles as $article)
                <x-shop.packages :article="$article" />

                <style>
                    .{{ $article->icon }} {
                        background: {{ $article->color }};
                    }
                </style>
            @endforeach
        </div>
    </div>

    <div class="row-start-2 md:row-auto col-span-12 flex flex-col gap-y-3 md:col-span-5 lg:col-span-4 xl:col-span-3">
        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Top up account') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Donate to :hotel', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="text-sm text-center py-2 px-4 rounded bg-gray-100 text-black dark:text-gray-100 dark:bg-gray-700">
                {{ __('Current balance: $:balance', ['balance' => auth()->user()->website_balance]) }}
            </div>

            @if(config('paypal.live.client_id') && config('paypal.live.client_secret'))
                <form action="{{ route('paypal.process-transaction') }}" method="GET" class="mt-3">
                    @csrf

                    <x-form.input name="amount" type="number" value="0" placeholder="amount" />

                    <button type="submit" class="mt-2 w-full rounded bg-blue-600 hover:bg-blue-700 text-white p-2 border-2 border-blue-500 transition ease-in-out duration-150 font-semibold">
                        {{ __('Donate') }}
                    </button>
                </form>
            @else
                <p class="dark:text-gray-100  mt-4 text-xs">
                    {{ __('Please setup the paypal credentials to allow for top ups') }}
                </p>
            @endif
        </x-content.content-card>


        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Voucher') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Use a voucher for free credit') }}
            </x-slot:under-title>

            <form action="{{ route('shop.use-voucher') }}" method="POST">
                @csrf

                <x-form.input name="code" type="text" placeholder="Voucher" />

                <x-form.secondary-button classes="mt-2">
                    {{ __('Use voucher') }}
                </x-form.secondary-button>
            </form>
        </x-content.content-card>
    </div>

    @push('javascript')
        <script type="module">
            tippy('.user-badge');
        </script>
    @endpush
</x-app-layout>
