@props(['article'])

<div class="w-full">
    <a class="relative block h-[200px] sm:h-[300px] max-w-[759px] w-full shadow-[3px_3px_rgba(0,0,0,.3)] overflow-hidden" href="{{ route('article.show', ['article' => $article->id]) }}">
        <img class="h-full w-full object-cover" src="{{ $article->image }}" alt="">
        <div class="max-w-[260px] md:max-w-[330px] max-sm:hidden absolute top-3 left-3">
            <div class="flex flex-col gap-y-3">
                <div>
                    <h1 class="leading-7 font-semibold text-3xl uppercase">{{ $article->title }}</h1>
                    <p class="text-white/75 text-sm">{{ $article->created_at }}</p>
                </div>
                <p class="leading-4">{{ $article->short_story }}</p>
            </div>
        </div>
    </a>
</div>
