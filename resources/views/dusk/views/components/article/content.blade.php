@props(['article'])

<article class="prose dark:prose-invert">
    <h1>{{ $article->title }}</h1>

    {!! $article->full_story !!}
</article>