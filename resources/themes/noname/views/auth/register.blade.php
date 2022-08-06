<x-app-layout>
    <div class="col-span-12">
        <div class="w-full flex justify-between lg:px-[150px]">
            <div class="w-full lg:w-[420px] flex flex-col gap-y-8">
                <!-- Validation Errors -->
                <x-messages.flash-messages />

                <h2 class="text-2xl font-bold uppercase">
                    {{ __('Create a free account today!') }}
                </h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <div class="flex flex-col gap-y-2 mb-4">
                            <label class="block font-bold text-gray-700">
                                {{ __('Username') }}
                            </label>

                            <p class="text-gray-700">
                                {{ __('Your username is what you will have to use, when logging into :hotel. It is also what other users will know you as, so make sure you select a username that you like!', ['hotel' => setting('hotel_name')]) }}
                            </p>
                        </div>

                        <input id="username" type="text" class="focus:ring-0 border-4 border-gray-200 rounded-md focus:border-[#eeb425] w-full @error('name')  border-red-500 @enderror"
                               name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                        <p class="mt-1 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <div class="flex flex-col gap-y-2 mb-4">
                            <label class="block font-bold text-gray-700">
                                {{ __('Email') }}
                            </label>

                            <p class="text-gray-700">
                                {{ __('You will need your email if you were to ever forget your password, so make sure it is something that you remember.') }}
                            </p>
                        </div>

                        <input id="mail" type="email"
                               class="focus:ring-0 border-4 border-gray-200 rounded-md focus:border-[#eeb425] w-full @error('mail') border-red-500 @enderror" name="mail"
                               value="{{ old('mail') }}" required autocomplete="email">



                        @error('mail')
                        <p class="mt-1 text-xs italic text-red-500">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>


                    <!-- Password -->
                    <div class="mt-4 bg-[#efefef] rounded-md p-3 flex flex-col gap-y-6">
                        <div>
                            <label class="block font-bold">
                                {{ __('Password') }}
                            </label>

                            <p class="my-2 text-gray-700">
                                {{ __('Your password must contain atleast 8 characters. Make sure to use a unique & secure password.') }}
                            </p>

                            <input id="password" type="password"
                                   class="focus:ring-0 border-4 border-gray-200 rounded-md focus:border-[#eeb425] w-full @error('password') border-red-500 @enderror" name="password"
                                   required autocomplete="password">

                            @error('password')
                            <p class="mt-1 text-xs italic text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <hr>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block font-bold mb-5">
                                {{ __('Repeat Password') }}
                            </label>

                            <input id="password-confirm" type="password" class="focus:ring-0 border-4 border-gray-200 rounded-md focus:border-[#eeb425] w-full "
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="mt-4 bg-[#efefef] rounded-md p-3 flex gap-x-3">
                        <input id="terms" type="checkbox" name="terms" class="rounded mt-1 ring-0 focus:ring-0">

                        <label for="terms" class="font-semibold text-gray-700">
                            {{ __('I accept the terms of service, privacy policy and cookie policy.') }}
                        </label>
                    </div>

                    <input type="hidden" name="referral_code" value="{{ $referral_code }}">


                   <button class="mt-4 w-full rounded-md bg-[#eeb425] text-white p-2 transition ease-in-out duration-200 hover:scale-[102%] font-bold">
                       {{ __('Create account') }}
                   </button>
                </form>
            </div>

            <div class="hidden lg:block">
                <img src="https://forcehotel.co.uk/templates/mezz/assets/images/registration/background.png" alt="">
            </div>
        </div>
    </div>
</x-app-layout>
