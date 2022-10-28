<x-app-layout>
    @push('title', __('Two factor challenge'))

    <div class="col-span-12 lg:px-[250px] flex flex-col gap-y-3">
        <div class="rounded bg-white shadow dark:bg-gray-900 p-4">
                <p>
                    {{ __('Please enter your 2-factor authentication code provided on your by the authentication app on your mobile phone.') }}
                </p>

                <form action="/two-factor-challenge" method="POST" class="mt-8">
                    @csrf

                    <x-form.label for="code">
                        {{ __('Code') }}
                    </x-form.label>

                    <x-form.input name="code" placeholder="{{ __('Code') }}" />

                    <div class="mt-4">
                        <x-form.label for="recovery_code">
                            {{ __('Recovery code') }}

                            <x-slot:info>
                                {{ __('In case you dont have access to your two-factor authentication code, you can use one of your recovery codes.') }}
                            </x-slot:info>
                        </x-form.label>

                        <x-form.input name="recovery_code" :required="false" placeholder="{{ __('Recovery code') }}" />
                    </div>

                    <div class="flex justify-end">
                        <x-form.secondary-button classes="md:w-1/4 mt-4">
                            {{ __('Confirm 2FA') }}
                        </x-form.secondary-button>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>
