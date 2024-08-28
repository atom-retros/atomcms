@props(['ticket'])

<x-card.base title="{{ $ticket->title }}" subtitle="{{ $ticket->user->username }}" icon="chat" icon-color="#375571">
    <div class="flex flex-col gap-3">
        <div class="max-w-full prose dark:prose-invert">
            <p>{{ $ticket->content }}</p>
        </div>

        <x-form.form route="{{ route('help-center.tickets.destroy', $ticket) }}" class="flex items-center justify-end">
            @method('DELETE')

            <x-button type="submit" variant="danger">{{ __('Delete') }}</x-button>
        </x-form.form>
    </div>
</x-card.base>