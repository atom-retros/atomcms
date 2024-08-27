@props(['user'])

<div class="col-span-1">
    <img src="{{ asset('images/profile/friends.png') }}" alt="friends" />

    <x-card.base title="{{ __('Friends') }}">
        <div class="grid justify-between col-span-2 gap-3 sm:grid-cols-4 md:grid-cols-8">
            @forelse($user->friends->whereNotNull('friend') as $friend)
                <x-profile.friend.item :friend="$friend" />
            @empty
                <p class="col-span-2 text-sm font-semibold text-center dark:text-white md:col-span-8 sm:col-span-4">
                    {{ __('It seems like :user has no friends.', ['user' => $user->username]) }}
                </p>
            @endforelse
        </div>
    </x-card.base>
</div>
