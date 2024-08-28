@props(['articles'])

@foreach ($articles as $article)
    <x-shop.item :article="$article" />
@endforeach