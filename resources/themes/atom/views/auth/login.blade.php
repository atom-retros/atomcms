<x-app-layout>
    @push('title', __('Create account'))

    <!-- Validation Errors -->
    <x-messages.flash-messages />

    <div class="col-span-12">
        <div class="lg:px-[250px]">
            <x-content.content-section icon="hotel-icon" classes="flex flex-col">
                <x-slot:title>
                    {{ __('Login to :hotel', ['hotel' => setting('hotel_name')]) }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Login to :hotel and take part in the most wonderful online world!', ['hotel' => setting('hotel_name')]) }}
                </x-slot:under-title>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <div class="flex flex-col gap-y-2">
                            <x-form.label for="username">
                                {{ __('Username') }}
                            </x-form.label>
                        </div>

                        <x-form.input error-bag="register" name="username" type="text" value="{{ old('username') }}" placeholder="{{ __('Username') }}" :autofocus="true"/>
                    </div>

                    <div class="mt-4">
                        <x-form.label for="password">
                            {{ __('Password') }}
                        </x-form.label>

                        <x-form.input error-bag="register" name="password" type="password" placeholder="{{ __('Password') }}" />
                    </div>

                    @if(setting('google_recaptcha_enabled'))
                        <div class="g-recaptcha mt-4" data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
                    @endif

                    <div class="mt-4">
                        <x-form.primary-button>
                            {{ __('Login') }}
                        </x-form.primary-button>
                    </div>
                </form>
            </x-content.content-section>
        </div>
    </div>

    @if(setting('google_recaptcha_enabled'))
        @push('javascript')
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        @endpush
    @endif
</x-app-layout>
