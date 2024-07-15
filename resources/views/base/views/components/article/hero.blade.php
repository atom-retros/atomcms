<x-card>
    <figure class="h-20 overflow-hidden">
        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="object-cover h-auto min-w-full min-h-full max-w-auto">
    </figure>
</x-card>