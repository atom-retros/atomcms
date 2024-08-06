@props(['ticket'])

<article class="p-3 prose-sm prose dark:prose-invert">
    <h1>{{ $ticket->title }}</h1>
    <h3>{{ $ticket->category->name }}</h3>
    <p>{{ $ticket->content }}</p>
</article>