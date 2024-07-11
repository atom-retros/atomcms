@props(['ticket'])

<a href="{{ route('help-center.tickets.show', $ticket) }}">
    <x-card class="dark:bg-gray-950 p-3 flex items-center gap-3">
        <div class="flex-1">
            <p class="text-sm font-semibold">{{ $ticket->title }}</p>
            <p class="text-xs text-gray-500">{{ $ticket->category->name }}</p>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
        </svg>
    </x-card>
</a>