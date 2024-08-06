<x-app-layout>
    @push('title', __('title.password'))

    <x-form.form action="{{ route('users.settings.password.store') }}" class="flex flex-col gap-6">
        <x-form.input id="password" label="{{ __('form.password') }}" type="password" required />
        <x-form.input id="password_confirmation" label="{{ __('form.password_confirmation') }}" type="password" required />
        <x-button.primary type="submit">{{ __('button.update') }}</x-button.primary>
    </x-form.form>
</x-app-layout>
