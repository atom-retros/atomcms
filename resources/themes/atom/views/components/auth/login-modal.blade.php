<div id="authentication-modal" tabindex="-1" class="hidden transition ease-in-out duration-200 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="py-6 px-6 lg:px-8">
                <div class="flex flex-col items-center mb-2">
                    <h2 class="font-semibold text-2xl">{{ __('Hello!') }}</h2>
                    <p>
                        {{ __('There is currently :online users online', ['online' => DB::table('users')->where('online', '1')->count()]) }}
                    </p>
                </div>

                <form class="flex flex-col gap-y-3" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div>
                        <x-form.label for="username">
                            {{ __('Username') }}
                        </x-form.label>

                        <x-form.input name="username" :autofocus="true" />
                    </div>

                    <div>
                        <x-form.label for="password">
                            {{ __('Password') }}
                        </x-form.label>

                        <x-form.input name="password" type="password" />
                    </div>

                    @if(setting('google_recaptcha_enabled'))
                        <div class="g-recaptcha" data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
                    @endif

                    <x-form.primary-button>
                        {{ __('Login') }}
                    </x-form.primary-button>

                    <div class="text-center font-semibold text-gray-700 text-sm">
                        <a href="{{ route('register') }}" class="hover:underline">
                            {{ __('Dont have an account? Join now!') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if(setting('google_recaptcha_enabled'))
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endif