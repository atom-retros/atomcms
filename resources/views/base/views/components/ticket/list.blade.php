@props(['tickets'])

@foreach ($tickets as $ticket)
    <x-ticket.item :ticket="$ticket" />
@endforeach