<x-app-layout>
    @push('title', 'Create account')
    @push('scripts', '<script async src="https://www.google.com/recaptcha/api.js"></script>')

    <section>
        <div class="grid lg:grid-cols-3 gap-4">
            <div class="max-w-[560px] w-full col-span-1 mx-auto">
                <h1 class="font-semibold text-3xl uppercase pb-4">
                    {{ __('Create account') }}
                </h1>

                @if($errors->has('desc'))
                    <p class="text-red-500">
                        {{ $errors->first('desc') }}
                    </p>
                @endif

                <form class="grid gap-3" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div>
                        <p>{{ __('Username') }}</p>
                        <p class="text-[#7ecaee]">
                            {{ __('Your username is what you will have to use, when logging into :hotel.', ['hotel' => setting('hotel_name')]) }}
                        </p>
                        <x-app.input.normal :value="old('username')" name="username" id="username" required :error="$errors->has('already_exists') || $errors->has('username')" />
                    </div>

                    <div>
                        <p>{{ __('E-mail') }}</p>
                        <p class="text-[#7ecaee]">
                            {{ __('You will need your email if you were to ever forget your password.') }}
                        </p>
                        <x-app.input.normal type="email" :value="old('email')" name="mail" id="email" required :error="$errors->has('already_exists')" />
                    </div>

                    <div class="bg-[var(--blue-dark)] grid gap-y-2 rounded p-3">
                        <div>
                            <p>{{  __('Password') }}</p>
                            <p class="text-[#7ecaee]">
                                {{ __('Your password must contain atleast 8 characters. Make sure to use a unique & secure password.') }}
                            </p>
                            <x-app.input.normal type="password" name="password" id="password" required :error="$errors->has('confirmation')" />
                        </div>

                        <div>
                            <p>
                                {{ __('Repeat Password') }}
                            </p>
                            <x-app.input.normal type="password" name="password_confirmation" id="password_confirmation" required :error="$errors->has('confirmation')" />
                        </div>
                    </div>

                    <div class="bg-[var(--blue-dark)] grid gap-y-2 rounded p-3">
                        <div x-data="{ modal: false }" class="pl-5">
                            <label class="relative">
                                <input class="absolute left-[-20px] top-1" type="checkbox" required>
                                <span class="text-[#7ecaee]">
                                    {{ __('I accept the :hotel', ['hotel' => setting('hotel_name')]) }} <span x-on:click="modal = true" class="text-white hover:underline hover:cursor-pointer">{{ __(' terms & conditions.') }}</span>.
                                </span>
                            </label>

                            <div x-show="modal === true" style="visibility: hidden" x-bind:style="modal === true && { visibility: 'unset' }">
                                <x-app.modal>
                                    <div class="flex flex-col gap-2">
                                        <div class="grid gap-4">
                                            <p>
                                                Bei einem Verstoß oder sobald es die Leitung als angebracht ansieht, können von einem Teammitglied/Mitarbeiter Daten von diesem Account geändert oder unwiderruflich gelöscht werden. Zur Änderung der Daten gehört unteranderem der Ausschluss (auch bekannt als Ban) oder das entfernen von digitalem Eigentum. Bei Rechtlichen Verstöße wie das Verbreiten von Kinderpornografien behalten wir uns das Recht vor, Personenbezogene Daten zu speichern und dies zur Anzeige zu bringen.
                                            </p>

                                            <p>

                                            </p>

                                            <div>
                                                <h1 class="font-semibold text-xl">Generell</h1>
                                                <ul class="list-decimal pl-4">
                                                    <li>
                                                        <p>Inhalte (Als Bild, Text oder Ton), die hasserregend, ausländerfeindlich, obszön, vulgär, pornografisch, rassistisch, menschenverachtend, abscheulich, bedrohlich, sittenwidrig oder in sonstiger Weise anstößig sind, sind nicht gestattet.</p>
                                                    </li>
                                                    <li>
                                                        <p>Das ausnutzen von Fehlern jeglicher Art ist nicht gestattet und muss unverzüglich einem Teammitglied/Mitarbeiter gemeldet werden.</p>
                                                    </li>
                                                    <li>
                                                        <p>Das verbreiten von möglichen Fehlern, Fehlinformationen oder Personenbezogene Daten an Spieler (als Bild, Text oder Ton) ist nicht gestattet.</p>
                                                    </li>
                                                    <li>
                                                        <p>Das verwenden von Software welche einen unfair Vorteil gegenüber andere verschafft ist nicht gestattet (Autoclicker etc.).</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div>
                                                <h1 class="font-semibold text-xl">Account</h1>
                                                <ul class="list-decimal pl-4">
                                                    <li>
                                                        <p>Das verwenden von einem Account von zwei (oder mehr) unterschiedlichen Personen ist nicht gestattet.</p>
                                                    </li>
                                                    <li>
                                                        <p>Ein Account ist mit einem sicheren und geheimen Passwort zu schützen.</p>
                                                    </li>
                                                    <li>
                                                        <p>Ein Account wird nur mit einer gültigen und eigener E-Mail-Adresse verwendet.</p>
                                                    </li>
                                                    <li>
                                                        <p>Das verkaufen, tauschen oder verschenken von einem Account in jeglicher Art ist nicht gestattet.</p>
                                                    </li>
                                                    <li>
                                                        <p>Das erstellen von Multi-Accounts (auch Doppelaccount) ist ohne Einverständnis von einem Teammitglied/Mitarbeiter nicht gestattet.</p>
                                                    </li>
                                                    <li>
                                                        <p>Das verwenden von einem VPN zum nutzen oder erstellen von einem Account ist nicht gestattet.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <x-app.button.info x_onclick="modal = false">Verstanden</x-button.info>
                                    </div>
                                    </x-modal>
                            </div>
                        </div>
                    </div>

                    <div class="g-recaptcha mx-auto" data-sitekey={{ config('services.recaptcha.public') }}></div>

                    <x-app.button.info :submit="true">
                        {{ __('Done! Take me to the hotel') }}
                    </x-app.button.info>
                </form>
            </div>

            <div class="max-lg:hidden col-span-2 ms-auto">
                <img class="drop-shadow-[0px_0px_10px_rgba(235,235,235,.5)]" src="{{ Vite::asset('resources/images/sign.png') }}" alt="">
            </div>
        </div>
    </section>
</x-app-layout>
