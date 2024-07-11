@props(['users', 'title', 'icon', 'value'])

<x-card class="bg-gray-100 dark:bg-gray-950">
    <x-slot name="title">
        <p class="flex-1">{{ $title }}</p>
        <img src="{{ asset('images/icons/' . $icon) }}" alt="{{ $title }}" class="w-4 h-4" />
    </x-slot>

    <div class="flex flex-col gap-3 p-3">
        @foreach ($users as $index => $user)
            <x-leaderboard.item :user="$user" :value="$value" position="{{ $index + 1 }}" />
        @endforeach
    </div>
</x-card>