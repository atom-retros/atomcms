@props(['articles'])

<div class="flex flex-col gap-6">
    @forelse ($articles as $article)
        <x-article.item :article="$article" />
    @empty
        <x-article.empty />
    @endforelse
</div>
