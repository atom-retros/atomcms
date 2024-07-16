@props(['article'])

<a href="{{ route('community.articles.show', $article) }}">
    <x-card class="bg-gray-100 dark:bg-gray-950">
        <figure class="h-20 overflow-hidden">
            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="object-cover h-auto min-w-full min-h-full max-w-auto">
        </figure>

        <div class="flex flex-col gap-1 p-3 truncate">
            <p class="text-sm font-semibold">{{ $article->title }}</p>
            <div class="flex items-center gap-3">
                <a href="{{ route('profiles', $article->user) }}" class="flex items-center gap-3">
                    <button class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full">
                        <x-avatar username="{{ $article->user->username }}" figure="{{ $article->user->look }}" headonly />
                    </button>
                    <p class="text-sm font-light">{{ $article->user->username }}</p>
                </a>
            </div>
        </div>
    </x-card>
</a>