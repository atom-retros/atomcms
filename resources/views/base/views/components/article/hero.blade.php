<x-card>
    <figure class="h-20">
        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="object-none object-right w-auto h-full min-w-full transition-all duration-500 max-w-none group-hover:object-center">
    </figure>
</x-card>