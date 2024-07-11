@props(['ticket'])

<x-card class="p-3 prose prose-sm dark:prose-invert">
    <h1>{{ $ticket->title }}</h1>
    <h3>{{ $ticket->category->name }}</h3>
    <p>{{ $ticket->content }}</p>
</x-card>