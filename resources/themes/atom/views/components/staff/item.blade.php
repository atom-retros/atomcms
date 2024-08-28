@props(['permission'])

<x-card.base badge="{{ $permission->badge }}" title="{{ $permission->rank_name }}" subtitle="{{ $permission->job_description }}" icon-color="#327fa8">
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($permission->users as $user)
            <x-card.base class="!p-0 dark:bg-gray-900">
                <a href="{{ route('profiles', $user->username) }}" class="flex flex-col w-full h-full">
                    <div class="h-20 bg-pink-500" style="background-image: url({{ asset('images/staff-bg.png') }})">
                        <div class="h-20 p-3 bg-black/50">
                            <div class="w-3 h-3 ml-auto {{ $user->online === '1' ? 'bg-green-500' : 'bg-red-500' }} rounded-full"></div>
                        </div>
                    </div>
                    <div class="flex items-center h-12 gap-3">
                        <div class="w-16 h-28" style="background-image: url({{ $user->avatar }}&action=wav&head_direction=3)"></div>
                        <div class="flex flex-col gap-1">
                            <p class="text-xs font-medium dark:text-white">{{ $user->username }}</p>
                            <p class="text-xs dark:text-gray-400">{{ $permission->rank_name }}</p>
                        </div>
                    </div>
                </a>
            </x-card.base>
        @empty
            <div class="col-span-1 text-center sm:col-span-2 lg:col-span-3 dark:text-gray-400">
                {{ __('We currently have no staff in this position') }}
            </div>
        @endforelse
    </div>
</x-card.base>
