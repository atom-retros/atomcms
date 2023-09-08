<x-app-layout>
    @push('title', __('Articles'))

    <div class="col-span-12">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @forelse($articles as $article)
                <x-article-card :article="$article" />
            @empty
                <x-filler-article-card />
            @endforelse
        </div>

        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
