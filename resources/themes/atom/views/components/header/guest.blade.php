@guest
    <x-modals.modal-wrapper>
        <div class="flex justify-center">
            <div class="text-white font-semibold flex-col md:w-[600px]">
                <p class="hidden text-xl text-center md:block">
                    {{ __('An online virtual world where you can create your own avatar, make friends, chat, create rooms and much more!') }}
                </p>

                <div class="flex flex-col items-center justify-center gap-x-6 gap-y-4 md:mt-6 md:flex-row md:gap-y-0">
                    <button type="button" x-on:click="open = true"
                        class="px-8 py-2 uppercase transition duration-200 ease-in-out border-2 border-white rounded-full hover:bg-white hover:text-black">
                        {{ __('Login') }}
                    </button>

                    <p class="text-sm uppercase text-opacity-80">{{ __('Or') }}</p>

                    <a data-turbolinks="false" href="{{ route('register.index') }}">
                        <button
                            class="uppercase bg-green-600 bg-opacity-80 px-8 py-2.5 rounded-full transition ease-in-out duration-200 hover:bg-opacity-100">
                            {{ __('Create an account') }}
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <x-modals.regular-modal x-model="show {{ session()->get('wrong-auth') }}">
            <x-modals.login-form />
        </x-modals.regular-modal>
    </x-modals.modal-wrapper>
@endguest