<div x-cloak x-show="open"  x-transition class="absolute top-0 left-0 w-screen h-screen bg-black bg-opacity-50 z-50 p-4">
    <div @click.outside="open = false" class="bg-white dark:bg-gray-900 rounded relative mx-auto top-0 md:top-64 z-[100] shadow-md w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
        <button type="button" @click="open = false" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">{{ __('Close modal') }}</span>
        </button>

        <div class="py-6 px-6 lg:px-8 text-black dark:text-gray-200">
            <div class="flex flex-col items-center mb-2">
                <h2 class="font-semibold text-2xl">{{ __('Hello!') }}</h2>
                <p class="dark:text-gray-400">
                    {{ __('There is currently :online users online', ['online' => DB::table('users')->where('online', '1')->count()]) }}
                </p>
            </div>

            <form class="flex flex-col gap-y-3" action="{{ route('login') }}" method="POST">
                @csrf

                <div>
                    <x-form.label for="username">
                        {{ __('Username') }}
                    </x-form.label>

                    <x-form.input error-bag="login" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" :autofocus="true" />
                </div>

                <div>
                    <x-form.label for="password">
                        {{ __('Password') }}
                    </x-form.label>

                    <x-form.input error-bag="login" name="password" placeholder="{{ __('Password') }}" type="password" />
                </div>

                @if(setting('google_recaptcha_enabled'))
                    <div class="g-recaptcha" data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
                @endif

                <x-form.primary-button>
                    {{ __('Login') }}
                </x-form.primary-button>

                <div class="text-center font-semibold text-gray-700 text-sm dark:text-gray-400">
                    <a href="{{ route('register') }}" class="hover:underline">
                        {{ __('Dont have an account? Join now!') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none }
</style>