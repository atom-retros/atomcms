<x-slot name="title">
    <h2 class="text-2xl font-semibold">{{ __('Hello!') }}</h2>
    <p class="dark:text-gray-400">{{ __('There is currently :online users online', ['online' => $online]) }}</p>
</x-slot>

<x-form.form route="{{ route('login.store') }}" class="flex flex-col gap-y-3">
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

    <x-button type="submit" variant="primary">{{ __('Login') }}</x-button>

    <div class="text-sm font-semibold text-center text-gray-700 dark:text-gray-400">
        <a href="{{ route('register.index') }}" class="hover:underline" x-on:click="open = false">
            {{ __('Dont have an account? Join now!') }}
        </a>
    </div>
</x-forms.form>