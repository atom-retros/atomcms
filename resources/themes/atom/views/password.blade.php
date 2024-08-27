@extends('layouts.app')

@push('title', __('Password settings'))

@section('content')
    <x-container-settings>
        <x-card.base title="{{ __('Password settings') }}" subtitle="{{ __('Change your password by filling out the fields below') }}" icon="hotel">
            <x-form.form action="{{ route('users.settings.password.store') }}" class="flex flex-col flex-1 gap-3">
                <x-form.input
                    id="password_current"
                    label="{{ __('Current password') }}"
                    info="{{ __('Enter your current password') }}"
                    type="password"
                />

                <x-form.input
                    id="password"
                    label="{{ __('New password') }}"
                    info="{{ __('Enter a new secure password. Do not forget to save it somewhere safe') }}"
                    type="password"
                />

                <x-form.input
                    id="password_confirmation"
                    label="{{ __('Confirm new password') }}"
                    info="{{ __('Please confirm your new password') }}"
                    type="password"
                />

                <div class="ml-auto">
                    <x-button type="submit">{{ __('Update password') }}</x-button>
                </div>
            </x-form.form>
        </x-card.base>
    </x-container-settings>
@endsection