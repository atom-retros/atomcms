<x-app-layout>
    @push('title', __('Articles'))

    <div class="col-span-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($articles as $article)
                <x-article-card :article="$article"/>
            @empty
                <h2 class="text-2xl font-semibold sm:col-span-2 md:col-span-3 lg:col-span-4">{{ __('There is currently no articles') }}</h2>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
