<x-app-layout>
    <div class="col-span-12">
        <div class="w-full flex justify-between lg:px-[150px]">
            <div class="w-full lg:w-[420px] flex flex-col gap-y-8">
                <h2 class="text-2xl font-bold uppercase">
                    {{ __('Create a free account today!') }}
                </h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <div class="flex flex-col gap-y-2">
                            <x-form.label for="username">
                                {{ __('Username') }}

                                <x-slot:info>
                                    {{ __('Your username is what you will have to use, when logging into :hotel. It is also what other users will know you as, so make sure you select a username that you like!', ['hotel' => setting('hotel_name')]) }}
                                </x-slot:info>
                            </x-form.label>
                        </div>

                        <x-form.input name="username" type="text" value="{{ old('username') }}" :autofocus="true"/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <div class="flex flex-col gap-y-2">
                            <x-form.label for="mail">
                                {{ __('Email') }}

                                <x-slot:info>
                                    {{ __('You will need your email if you were to ever forget your password, so make sure it is something that you remember.') }}
                                </x-slot:info>
                            </x-form.label>
                        </div>

                        <x-form.input name="mail" type="email" value="{{ old('mail') }}" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 bg-[#efefef] rounded-md p-3 flex flex-col gap-y-6">
                        <div>
                            <x-form.label for="password">
                                {{ __('Password') }}

                                <x-slot:info>
                                    {{ __('Your password must contain atleast 8 characters. Make sure to use a unique & secure password.') }}
                                </x-slot:info>
                            </x-form.label>

                            <x-form.input name="password" type="password" />
                        </div>
                        <hr>

                        <!-- Confirm Password -->
                        <div>
                            <x-form.label for="password_confirmation">
                                {{ __('Repeat Passwords') }}
                            </x-form.label>

                            <x-form.input name="password_confirmation" type="password" />
                        </div>
                    </div>

                    <div class="mt-4 bg-[#efefef] rounded-md p-3 flex gap-x-3">
                        <input id="terms" type="checkbox" name="terms" class="rounded mt-1 ring-0 focus:ring-0">

                        <label for="terms" class="font-semibold text-gray-700">
                            {{ __('I accept the terms of service, privacy policy and cookie policy.') }}
                        </label>
                    </div>

                    {{-- Used to determine the refer --}}
                    <input type="hidden" name="referral_code" value="{{ $referral_code }}">

                    <x-form.primary-button>
                        {{ __('Create account') }}
                    </x-form.primary-button>
                </form>
            </div>

            <div class="hidden lg:block">
                <img src="https://forcehotel.co.uk/templates/mezz/assets/images/registration/background.png" alt="">
            </div>
        </div>
    </div>
</x-app-layout>
