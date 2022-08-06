<x-app-layout>
    <div class="col-span-12 md:col-span-3 flex flex-col gap-y-3">
        <x-user.settings.settings-navigation />
    </div>

    <div class="col-span-12 md:col-span-9 flex flex-col gap-y-3">
        <div class="rounded-lg bg-white shadow p-4">
            <x-messages.flash-messages />

            <form action="{{ route('settings.account.update') }}" method="POST" class="flex flex-col gap-y-4">
                @method('PUT')
                @csrf

                <div class="flex flex-col gap-y-1">
                    <label for="email">{{ __('E-mail') }}</label>
                    <input id="email" name="mail" type="email" value="{{ $user->mail }}" class="w-full rounded border border-gray-300" required autofocus>
                    <small>Make sure to use an email that you remember, if you ever lose your password, your email will be required.</small>
                </div>

                <div class="flex flex-col gap-y-1">
                    <label for="username">{{ __('Username') }}</label>
                    <input id="username" name="username" type="text" value="{{ $user->username }}" class="w-full rounded border border-gray-300" required autofocus>
                    <small>Your username is what you and others will see in-game.</small>
                </div>

                <div class="w-full flex justify-start md:justify-end">
                    <button type="submit" class="w-full lg:w-1/6 bg-green-600 hover:bg-green-700 transition duration-200 ease-in-out py-2 px-2 rounded-md w-full text-white">
                        {{ __('Update settings') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
