@props(['article'])

<a href="{{ route('community.articles.show', $article) }}">
    <x-card class="bg-gray-100 dark:bg-gray-950">
        <figure class="h-20">
            <img src="{{ $article->image }}" alt="{{ $article->title }}" class="object-none object-right w-auto h-full min-w-full transition-all duration-500 max-w-none">
        </figure>

        <div class="flex flex-col gap-1 p-3 truncate">
            <p class="font-semibold text-sm">{{ $article->title }}</p>
            <a href="{{ route('profiles', $article->user) }}" class="flex gap-3 items-center">
                <button class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full">
                    <x-avatar username="{{ $article->user->username }}" figure="{{ $article->user->look }}" headonly />
                </button>
                <p class="font-light text-sm">{{ $article->user->username }}</p>
            </a>
        </div>
    </x-card>
</a>
