@props(['ticket'])

<div class="flex flex-col gap-3">
    @foreach ($ticket->replies as $reply)
        <x-ticket.comment.item :reply="$reply" />
    @endforeach
</div>