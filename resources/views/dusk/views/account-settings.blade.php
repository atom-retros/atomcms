<x-app-layout>
    @push('title', __('title.account_settings'))

    <x-form.form action="{{ route('users.settings.account.store') }}" class="flex flex-col gap-6">
        <x-form.input id="mail" label="{{ __('form.email') }}" value="{{ auth()->user()->mail }}" type="email" />
        <x-form.input id="motto" label="{{ __('form.motto') }}" value="{{ auth()->user()->motto }}" />
        <x-button.primary type="submit">{{ __('button.update') }}</x-button.primary>
    </x-form.form>
</x-app-layout>
