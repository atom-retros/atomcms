<x-app-layout>
    @push('title', __('title.index'))

    <x-form.form route="{{ route('login.store') }}" class="flex flex-col gap-6 bg-gray-100 p-3 rounded-lg dark:bg-gray-950">
        <x-form.input id="username" label="{{ __('form.username') }}" value="{{ old('username') }}" required />
        <x-form.input id="password" label="{{ __('form.password') }}" type="password" required />
        <x-button.primary type="submit">{{ __('buttons.login') }}</x-button.primary>
    </x-form.form>

    <a href="{{ route('register.index') }}" class="flex flex-col">
        <x-button.secondary>{{ __('buttons.create_account') }}</x-button.primary>
    </a>
</x-app-layout>
