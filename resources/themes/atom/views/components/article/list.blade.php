@props(['articles'])

@foreach ($articles as $article)
    <x-article.item :article="$article" />
@endforeach