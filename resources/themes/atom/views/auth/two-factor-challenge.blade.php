<x-app-layout>
    @push('title', __('Two factor challenge'))

    <div class="col-span-12 lg:px-[250px] flex flex-col gap-y-3">
        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Two-factor verification') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Enter your 2-factor authentication code provided on your by the authentication app on your mobile phone.') }}
            </x-slot:under-title>

                <form action="/two-factor-challenge" method="POST">
                    @csrf

                    <div id="twoFactorCode">
                        <x-form.label for="code">
                            {{ __('Code') }}

                            <x-slot:info>
                                {{ __('Enter the code from your authentication app') }}
                            </x-slot:info>
                        </x-form.label>

                        <x-form.input name="code" placeholder="{{ __('Code') }}" :autofocus="true" />
                        <small onclick="toggleRecoveryCodeField()" class="italic text-gray-600 hover:underline hover:cursor-pointer">Lost access to your 2FA codes? Click here to use a recovery code</small>
                    </div>

                    <div id="recoveryCode">
                        <x-form.label for="recovery_code">
                            {{ __('Recovery code') }}

                            <x-slot:info>
                                {{ __('In case you dont have access to your two-factor authentication code, you can use one of your recovery codes.') }}
                            </x-slot:info>
                        </x-form.label>

                        <x-form.input name="recovery_code" :required="false" placeholder="{{ __('Recovery code') }}" />
                        <small onclick="toggleRecoveryCodeField()" class="italic text-gray-600 hover:underline hover:cursor-pointer">{{ __('Regained access to your 2FA codes? Click here to use your authentication app ') }}</small>
                    </div>

                    <div class="flex justify-end">
                        <x-form.secondary-button classes="md:w-1/4 mt-4">
                            {{ __('Confirm 2FA') }}
                        </x-form.secondary-button>
                    </div>
                </form>
        </x-content.content-section>
    </div>

    @push('javascript')
        <script>
            document.querySelector('#recoveryCode').style.display = 'none';
            let showRecoveryCodeField = false;

            function toggleRecoveryCodeField() {
                if(!showRecoveryCodeField) {
                    document.querySelector('#twoFactorCode').style.display = 'none';
                    document.querySelector('#recoveryCode').style.display = 'block';

                    showRecoveryCodeField = true;

                    return;
                }

                document.querySelector('#twoFactorCode').style.display = 'block';
                document.querySelector('#recoveryCode').style.display = 'none';

                showRecoveryCodeField = false;
            }
        </script>
    @endpush
</x-app-layout>
