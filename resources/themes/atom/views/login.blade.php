@extends('layouts.app')

@push('title', __('Login'))

@section('content')
    <x-messages.flash-messages />

    <div class="flex flex-col justify-center col-span-12 gap-3">
        <div class="w-full max-w-3xl mx-auto">
            <x-card.base icon="hotel" title="{{ __('Login to :hotel', ['hotel' => $settings->get('hotel_name')]) }}" subtitle="{{ __('Login to :hotel and take part in the most wonderful online world!', ['hotel' => $settings->get('hotel_name')]) }}">
                <x-form.form route="{{ route('login.store') }}" class="flex flex-col gap-3">
                    <x-form.input
                        id="username"
                        label="{{ __('Username') }}"
                        placeholder="{{ __('Username') }}"
                        value="{{ old('username') }}"
                        autofocus
                    />

                    <x-form.input
                        id="password"
                        label="{{ __('Password') }}"
                        placeholder="{{ __('Password') }}"
                        type="password"
                    />

                    @if (config('services.turnstile.enabled'))
                        <x-turnstile />
                    @endif

                    <x-button type="submit">{{ __('Login') }}</x-button>
                </x-form.form>
            </x-card.base>
        </div>
    </div>
@endsection