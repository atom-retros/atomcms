<x-app-layout>
    @push('title', __('Login'))

    <!-- Validation Errors -->
    <x-messages.flash-messages />

    <section>
        <div class="grid lg:grid-cols-3 gap-4">
            <div class="max-w-[560px] w-full col-span-1 mx-auto">
                <h1 class="font-semibold text-3xl uppercase pb-4">
                    {{ __('Login to :hotel', ['hotel' => setting('hotel_name')]) }}
                </h1>

                @if($errors->has('desc'))
                    <p class="text-red-500">
                        {{ $errors->first('desc') }}
                    </p>
                @endif

                <form class="grid gap-3" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div>
                        <p>{{ __('Username') }}</p>
                        <x-app.input.normal type="text" :value="old('username')" name="username" id="username" required :error="$errors->has('wrong')" />
                    </div>

                    <div>
                        <div class="flex">
                            <p>
                                {{ __('Password') }}
                            </p>
                            <div x-data="{ modal: false }" class="ms-auto">
                                <p x-on:click="modal = true" class="font-semibold underline hover:cursor-pointer">{{ __('Forgot password?') }}</p>
                                <div x-show="modal === true" style="visibility: hidden" x-bind:style="modal === true && { visibility: 'unset' }">
                                    <x-app.modal>
                                        <div class="flex flex-col gap-2">
                                            <p>
                                                Solltest du das Passwort vergessen haben, kannst du bei uns auf dem Discord dich mit einem Ticket melden. Nenne uns in deinem Ticket bitte deine E-Mail-Adresse sowie deinen Benutzernamen und den ungefähren Zeitraum wann du dich registriert hast.
                                            </p>
                                            <x-app.button.info x_onclick="modal = false">Verstanden</x-button.info>
                                        </div>
                                        </x-modal>
                                </div>
                            </div>
                        </div>
                        <x-app.input.normal type="password" :value="old('password')" name="password" id="password" required :error="$errors->has('wrong') || $errors->has('password')" />
                    </div>

                    <x-app.button.info :submit="true">
                        {{ __('Login') }}
                    </x-app.button.info>
                </form>

                <div class="pt-5">
                    <p>{{ __('No account yet?') }} <a class="font-semibold underline" href="{{ route('register') }}">{{ __('Register here for free!') }}</a></p>
                </div>
            </div>

            <div class="max-lg:hidden col-span-2 ms-auto">
                <img class="drop-shadow-[0px_0px_10px_rgba(235,235,235,.5)]" src="{{ Vite::asset('resources/images/sign.png') }}" alt="">
            </div>
        </div>
    </section>
</x-app-layout>
