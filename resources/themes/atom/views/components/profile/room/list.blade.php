@props(['user'])

<div class="col-span-1">
    <img src="{{ asset('images/profile/rooms.png') }}" alt="rooms" />

    <x-card.base title="{{ __('Rooms') }}">
        <div class="grid justify-between col-span-2 gap-3 md:grid-cols-4">
            @forelse($user->rooms as $room)
                <x-profile.room.item :room="$room" />
            @empty
                <p class="col-span-2 text-sm font-semibold text-center dark:text-white md:col-span-8 sm:col-span-4">
                    {{ __('It seems like :user got no rooms.', ['user' => $user->username]) }}
                </p>
            @endforelse
        </div>
    </x-card.base>
</div>
