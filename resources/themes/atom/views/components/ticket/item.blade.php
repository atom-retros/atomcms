@props(['ticket'])

<a href="{{ route('help-center.tickets.show', $ticket) }}" class="flex items-center gap-3">
    <x-card.base class="w-full transition-all duration-300 hover:scale-105 dark:bg-gray-900">
        <div class="flex items-center gap-3">
            <div class="flex-1">
                <p class="text-sm font-semibold dark:text-white">{{ $ticket->title }}</p>
                <p class="text-xs text-gray-500">{{ $ticket->category->name }}</p>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="dark:text-white">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"></path>
            </svg>
        </div>
</x-card.base>
</a>