<x-app-layout>
    <div class="col-span-12 md:col-span-3 flex flex-col gap-y-3">
        <x-user.settings.settings-navigation />
    </div>

    <div class="col-span-12 md:col-span-9 flex flex-col gap-y-3">
        <div class="rounded-lg bg-white shadow p-4">
            <x-messages.flash-messages />

            <form action="{{ route('settings.password.update') }}" method="POST" class="flex flex-col gap-y-4">
                @method('PUT')
                @csrf

                <div class="flex flex-col gap-y-1">
                    <label for="current_password">{{ __('Current password') }}</label>
                    <input id="current_password" name="current_password" type="password" class="w-full rounded border border-gray-300" required autofocus>
                    <small>{{ __('Enter your current password') }}</small>
                </div>

                <div class="flex flex-col gap-y-1">
                    <label for="password">{{ __('New password') }}</label>
                    <input id="password" name="password" type="password" class="w-full rounded border border-gray-300" required autofocus>
                    <small>{{ __('Enter a new secure password. Do not forget to save it somewhere safe') }}</small>
                </div>

                <div class="flex flex-col gap-y-1">
                    <label for="password-confirm">{{ __('Confirm new password') }}</label>
                    <input id="password-confirm" name="password_confirmation" type="password" class="w-full rounded border border-gray-300" required autofocus>
                    <small>{{ __('Please confirm your new password') }}</small>
                </div>

                <div class="w-full flex justify-start md:justify-end">
                    <button type="submit" class="w-full lg:w-1/6 bg-green-600 hover:bg-green-700 transition duration-200 ease-in-out py-2 px-2 rounded-md w-full text-white">
                        {{ __('Update password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
