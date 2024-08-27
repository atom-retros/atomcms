@extends('layouts.app')

@push('title', __('Account settings'))

@section('content')
    <x-container-settings>
        <x-card.base title="{{ __('Account settings') }}" subtitle="{{ __('Manage your account settings') }}" icon="hotel">
            <x-form.form action="{{ route('users.settings.account.store') }}" class="flex flex-col flex-1 gap-3">
                <x-form.input
                    id="motto"
                    label="{{ __('Motto') }}"
                    info="{{ __('Spice up your profile with a nice motto') }}"
                    value="{{ auth()->user()->motto }}"
                    autofocus
                />

                <div class="bg-[#efefef] rounded-md p-3 flex flex-col gap-3 dark:bg-gray-900">
                    <x-form.input
                        id="mail_current"
                        label="{{ __('Current E-mail') }}"
                        info="{{ __('Enter your current email address') }}"
                        type="email"
                    />

                    <x-form.input
                        id="mail"
                        label="{{ __('E-mail') }}"
                        info="{{ __('Make sure to use an email that you remember, if you ever lose your password, your email will be required.') }}"
                        type="email"
                    />

                    <x-form.input
                        id="mail_confirmation"
                        label="{{ __('Confirm E-mail') }}"
                        info="{{ __('Make sure to use an email that you remember, if you ever lose your password, your email will be required.') }}"
                        type="email"
                    />
                </div>

                <div class="ml-auto">
                    <x-button type="submit">{{ __('Update settings') }}</x-button>
                </div>
            </x-form.form>
        </x-card.base>
    </x-container-settings>
@endsection