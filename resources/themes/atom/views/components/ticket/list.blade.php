@props(['tickets'])

<x-card.base title="{{ __('Open tickets') }}" subtitle="{{ __('Your current open tickets') }}" icon="duo_chat" icon-color="#eec980">
    <div class="flex flex-col gap-3">
        @foreach ($tickets as $ticket)
            <x-ticket.item :ticket="$ticket" />
        @endforeach
    </div>
</x-card.base>