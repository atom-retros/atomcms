<x-app-layout>
    @push('title', __('Two factor'))

    <div class="col-span-12 md:col-span-3 flex flex-col gap-y-3">
        <x-user.settings.settings-navigation />
    </div>

    <div class="col-span-12 md:col-span-9 flex flex-col gap-y-3">
        <div class="rounded bg-white shadow dark:bg-gray-900 p-4">
            <form method="POST" action="/user/confirm-password">
                @csrf

                <!-- Password -->
                <div class="flex flex-col gap-y-2">
                    <div>
                        <x-form.label for="password">
                            {{ __('Password') }}

                            <x-slot:info>
                                {{ __('You must confirm your current password before being able to enable 2FA.') }}
                            </x-slot:info>
                        </x-form.label>

                        <x-form.input error-bag="register" name="password" type="password" placeholder="{{ __('Enter your current password') }}" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-form.label for="password_confirmation">
                            {{ __('Repeat Password') }}
                        </x-form.label>

                        <x-form.input error-bag="register" name="password_confirmation" type="password" placeholder="{{ __('Repeat your current password') }}" />
                    </div>
                </div>

                @if(setting('google_recaptcha_enabled'))
                    <div class="g-recaptcha mt-4" data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
                @endif

                <div class="mt-4">
                    <x-form.primary-button>
                        {{ __('Confirm password') }}
                    </x-form.primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
