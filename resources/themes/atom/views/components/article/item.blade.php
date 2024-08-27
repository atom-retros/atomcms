@props(['article'])

<div class="group dark:bg-gray-900 rounded w-full bg-white shadow relative overflow-hidden transition ease-in-out duration-200 hover:scale-[101%]">
    <a href="{{ route('community.articles.show', $article) }}">
        <div class="w-full h-[110px] overflow-hidden">
            <img src="{{ Storage::exists($article->image) ? Storage::url($article->image) : $article->image }}" alt="{{ $article->title }}" class="object-none object-right min-h-full transition-all duration-300 group-hover:object-center" />
        </div>

        <div class="flex flex-col gap-3 p-3">
            <p class="text-base font-semibold truncate dark:text-gray-200">{{ $article->title }}</p>
            <div class="flex items-center gap-3">
                <div class="flex items-center w-8 h-8 overflow-hidden bg-gray-300 rounded-full jusitfy-center">
                    <img src="{{ $article->user->avatar }}&headonly=1" alt="{{ $article->user->username }}" />
                </div>

                <p class="text-sm text-gray-500 dark:text-white">{{ $article->user->username }}</p>
            </div>
        </div>
    </a>
</div>