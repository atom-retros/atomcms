@extends('layouts.app')

@push('title', __('Create account'))

@section('content')
    <div class="flex flex-col justify-center col-span-12 gap-3">
        <div class="w-full max-w-3xl mx-auto">
            <x-card.base icon="hotel" title="{{ __('Create your account!') }}" subtitle="{{ __('Create a free account, and be a part of a fun online world!') }}">
                <x-form.form route="{{ route('register.store') }}" class="flex flex-col gap-3">
                    <x-form.input
                        id="username"
                        label="{{ __('Username') }}"
                        info="{{ __('Your username is what you will have to use, when logging into Atom demo. It is also what other users will know you as, so make sure you select a username that you like!') }}"
                        placeholder="{{ __('Username') }}"
                        value="{{ old('username') }}"
                        autofocus
                    />

                    <x-form.input
                        id="mail"
                        label="{{ __('Email') }}"
                        info="{{ __('You will need your email if you were to ever forget your password, so make sure it is something that you remember.') }}"
                        placeholder="{{ __('Enter your email') }}"
                        value="{{ old('mail') }}"
                    />

                    <div class="bg-[#efefef] rounded-md p-3 flex flex-col gap-3 dark:bg-gray-900">
                        <x-form.input
                            id="password"
                            label="{{ __('Password') }}"
                            placeholder="{{ __('Choose a secure password') }}"
                            info="{{ __('Your password must contain atleast 8 characters. Make sure to use a unique & secure password.') }}"
                            type="password"
                        />

                        <hr class="dark:border-gray-700" />

                        <x-form.input
                            id="password_confirmation"
                            label="{{ __('Repeat Password') }}"
                            placeholder="{{ __('Repeat your chosen password') }}"
                            type="password"
                        />
                    </div>

                    <div class="bg-[#efefef] rounded-md p-3 flex flex-col gap-3 dark:bg-gray-900">
                        <x-form.checkbox
                            id="terms"
                            label="<a href='{{ route('help-center.rules') }}' target='_blank' class='font-semibold text-gray-700 hover:text-gray-900 hover:underline dark:hover:text-gray-300 dark:text-gray-500'>{{ __('I accept the :hotel terms & rules.', ['hotel' => $settings->get('hotel_name')]) }}</a>"
                        />
                    </div>

                    @if (config('services.turnstile.enabled'))
                        <x-turnstile />
                    @endif

                    <x-button type="submit">{{ __('Create account') }}</x-button>
                </x-form.form>
            </x-card.base>
        </div>
    </div>
@endsection