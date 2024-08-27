@props(['user'])

<div class="col-span-1">
    <img src="{{ asset('images/profile/groups.png') }}" alt="Guilds" />

    <x-card.base title="{{ __('Groups') }}">
        <div class="grid justify-between col-span-2 gap-3 sm:grid-cols-4 md:grid-cols-8">
            @forelse($user->guilds as $group)
                <x-profile.group.item :group="$group" />
            @empty
                <p class="col-span-2 text-sm font-semibold text-center dark:text-white md:col-span-8 sm:col-span-4">
                    {{ __('It seems like :user is not a member of any groups.', ['user' => $user->username]) }}
                </p>
            @endforelse
        </div>
    </x-card.base>
</div>

{{-- @todo - Guild badge storage... --}}