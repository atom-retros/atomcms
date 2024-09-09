<div id="disconnected" class="absolute inset-0 z-50 w-full h-screen transition-all duration-500 opacity-0 pointer-events-none">
    <div class="absolute w-full h-full bg-black bg-opacity-50"></div>

    <div class="relative flex flex-col items-center justify-center w-full h-full gap-4">
        <h2 class="text-2xl text-white">
            {{ __('Whoops! It seems like you have been disconnected...') }}
        </h2>

        <div class="flex gap-x-4">
            <a href="{{ route('game.nitro') }}">
                <x-button>{{ __('Reload client') }}</x-button>
            </a>

            <a href="{{ route('users.me') }}">
                <x-button variant="secondary">{{ __('Back to website') }}</x-button>
            </a>
        </div>
    </div>
</div>