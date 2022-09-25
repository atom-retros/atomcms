<x-app-layout>
    @push('title', __('Rules'))

    <div class="col-span-12 flex flex-col gap-y-3">
        <div class="w-full p-4 bg-red-600 text-white rounded mb-4">
            {{ __('Rules and regulations are subject to change without notice. As a member of the :hotel community, you hereby agree to and understand the following terms and conditions above. Failure to comply with these rules and regulations will result in the necessary sanctions implemented upon your account. If you have any questions or concerns in regards to The :hotel Way, please do not hesitate to ask a member of the Hotel Staff.', ['hotel' => setting('hotel_name')]) }}
        </div>

        <div class="flex flex-col gap-y-6">
            <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
                <x-slot:title>
                    {{ __('General Rules') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('The general rules of :hotel', ['hotel' => setting('hotel_name')]) }}
                </x-slot:under-title>

                <ul class="p-2 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                    <li><strong>1.1.</strong> {{ __('Do not abuse the Call for Help (CFH) system; it should be used during emergency purposes only.') }}</li>
                    <li><strong>1.2.</strong> {{ __('Do not advertise other Habbo Retros; hotel links or purposely mentioning the name of another hotel with the intentions of advertising is not permitted.') }}</li>
                    <li><strong>1.3.</strong> {{ __('Do not attempt to or scam credits or furniture from other users through betting, gaming, or trading.') }}</li>
                    <li><strong>1.4.</strong> {{ __('Do not bully, harass, or abuse other users; avoid violent or aggressive behavior.') }}</li>
                    <li><strong>1.5.</strong> {{ __('Do not disclose any personal information of another user (e.g., address, IP Address, phone number, school, private images etc.) without their consent.') }}</li>
                    <li><strong>1.6.</strong> {{ __('Do not excessively repeat identical or similar statements (spamming).') }}</li>
                    <li><strong>1.7.</strong> {{ __('Users are to not participate in any sexual, inappropriate, or generally objective acts towards other users without their prior consent.') }}</li>
                    <li><strong>1.8.</strong> {{ __('Do not make rooms with inappropriate or abusive names.') }}</li>
                    <li><strong>1.9.</strong> {{ __('Do not attempt to or successfully harm a user’s home internet connection.') }}</li>
                    <li><strong>1.10.</strong> {{ __('Do not disrupt events with explicit language or negative behavior.') }}</li>
                </ul>
            </x-content.content-section>

            <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
                <x-slot:title>
                    {{ __('Account Rules') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('The general account rules on :hotel', ['hotel' => setting('hotel_name')]) }}
                </x-slot:under-title>

                <ul class="p-2 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                    <li>
                        <strong>2.1</strong> {{ __('Do not attempt to or give away, buy, sell, or trade your') }} <strong>{{ setting('hotel_name') }}</strong>
                        {{ __('account and/or') }}
                        {{ config('habbo.site.shortname') }} {{ __('items for virtual items from another game, accounts from another game, cash, or vice versa without permission from an Administrator. This includes giving away, buying, selling or trading') }}
                        {{ config('habbo.site.shortname') }} {{ __('furniture/currency for Habbo furniture/currency or vice versa.') }}
                    </li>
                    <li><strong>2.2</strong> {{ __('Do not create a username with an offensive name that is insulting, racist, harassing, or generally objectionable.') }}</li>
                    <li><strong>2.3</strong> {{ __('Do not evade an IP Address ban.') }}</li>
                    <li><strong>2.4</strong> {{ __('Do not share your account with other users.') }}</li>
                    <li><strong>2.5</strong> {{ __('Do not threaten to, attempt to, or hack other users accounts.') }}</li>
                    <li><strong>2.6</strong> {{ __('Do not create multiple accounts for the purpose of taking an advantage over gaining more in-game currency and/or rares of any kind.') }}</li>
                    <li><strong>2.7</strong> {{ __('Do not re-appeal your ban unless stated otherwise. This means if you re-appeal in 2 days after your first appeal was denied and you were told to re-appeal in 2-3 weeks, you will be banned from the forum as well as the hotel.') }}</li>
                    <li><strong>2.8</strong> {{ __('Accounts are limited to 2 per person. This means, only 1 Alt acc is acceptable. Anything more than this, will result in a full account wipe including credits, and rares.') }}</li>
                </ul>
            </x-content.content-section>

            <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
                <x-slot:title>
                    {{ setting('hotel_name') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __(':hotel rules & guidelines', ['hotel' => setting('hotel_name')]) }}
                </x-slot:under-title>

                <ul class="p-2 bg-gray-100 rounded dark:bg-gray-700 dark:text-gray-300">
                    <li><strong>3.1</strong> {{ __('Do not attempt to or exploit errors of') }} <strong>{{ setting('hotel_name') }}</strong>; {{ __('report it to the Administration immediately.') }}</li>
                    <li><strong>3.2</strong> {{ __('Do not attempt to or refund your VIP Membership or donation to') }} <strong>{{ setting('hotel_name') }}</strong> {{ __('at any given time; all payments are final.') }}</li>
                    <li><strong>3.3</strong> {{ __('Do not intentionally give wrong or misleading information to staff members in reports about rule violations, complaints, bug reports, or support requests.') }}</li>
                    <li><strong>3.4</strong> {{ __('Do not make false statements against') }} <strong>{{ setting('hotel_name') }}</strong> {{ __('or any other part of its services.') }}</li>
                    <li><strong>3.5</strong> {{ __('Do not pretend to be a representative of') }} <strong>{{ setting('hotel_name') }}</strong>. {{ __('This includes mimicing, acting like them, and or claim to have staff powers.') }}</li>
                    <li><strong>3.6</strong> {{ __('Do not threaten to, attempt to, or use any scripts or third party software to enter, disrupt, or modify') }} <strong>{{ setting('hotel_name') }}</strong>.</li>
                    <li><strong>3.7</strong> {{ __('Non-harmful auto-typing, auto-clicking and other programs can only be used if you are the room owner or with permission from the room owner.') }}</li>
                </ul>
            </x-content.content-section>
        </div>
    </div>
</x-app-layout>
