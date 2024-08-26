@props(['index', 'item', 'fn'])

<a href="{{ route('profiles', $item) }}" class="block w-full">
    <button class="p-3 rounded bg-gray-100 flex gap-3 w-full text-left items-center h-[70px] overflow-hidden dark:bg-gray-900">
        <div @class(['flex items-center justify-center w-10 h-10 bg-gray-300 rounded-full', 'bg-[#f9d83e]' => $index === 0, 'bg-[#b8c4d4]' => $index === 1, 'bg-[#f1851b]' => $index === 2])>
            @if ($index === 0) <img src="{{ asset('images/leaderboards/trophy-gold.png') }}" alt="Trophy Gold" />
            @elseif ($index === 1) <img src="{{ asset('images/leaderboards/trophy-silver.png') }}" alt="Trophy Silver" />
            @elseif ($index === 2) <img src="{{ asset('images/leaderboards/trophy-bronze.png') }}" alt="Trophy Bronze" />
            @else <p>{{ $index + 1 }}</p> @endif
        </div>

        <img src="{{ $item->avatar }}&headonly=1" />

        <div class="flex flex-col gap-1">
            <p class="font-semibold text-gray-700 dark:text-gray-100">{{ $item->username }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $fn($item) }}</p>
        </div>
    </button>
</a>