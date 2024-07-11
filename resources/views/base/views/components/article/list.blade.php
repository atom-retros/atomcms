@props(['articles'])

<div class="flex flex-col gap-6">
    @foreach ($articles as $article)
        <x-article.item :article="$article" />
    @endforeach
</div>
