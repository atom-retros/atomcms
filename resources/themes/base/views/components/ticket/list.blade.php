@props(['tickets'])

@forelse ($tickets as $ticket)
    <x-ticket.item :ticket="$ticket" />
@empty
    <x-ticket.empty />
@endforelse