@props(['user'])

<x-card class="p-3 bg-cover bg-[url('https://atom.objectretro.net/assets/images/kasja_mepage_image.png')]">
    <div class="flex items-center gap-3">
        <a href="{{ route('profiles', ['user' => $user]) }}" class="h-24">
            <x-avatar username="{{ $user->username }}" figure="{{ $user->look }}" gesture="sml" action="sit" />
        </a>
        <p class="table px-3 py-1.5 bg-white text-gray-900 rounded-lg text-xs">
            <span class="font-semibold">{{ $user->username }}: </span>
            <span>{{ $user->motto }}</span>
        </p>

        @if (request()->user()->is($user))
            <a href="{{ route('game.nitro') }}" class="flex-shrink-0 ml-auto">
                <x-button.primary>Enter {{ $settings->get('hotel_name') }}</x-button.primary>
            </a>
        @endif
    </div>
</x-card>
