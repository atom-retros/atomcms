@props(['article'])

<div class="flex gap-3">
    <img class="min-w-[120px] max-w-[120px] w-full min-h-[120px] max-h-[120px] h-full shadow-[3px_3px_rgba(0,0,0,.3)]" src="{{ $article->img_small }}" alt="">
    <div>
        <a class="font-semibold text-lg sm:text-xl uppercase" href="{{ route('app.community.article', ['article' => $article->id]) }}">{{ $article->name }}</a>
        <p class="text-white/75 text-sm">{{ $article->created_at }}</p>
        <p class="text-sm text-[#7ecaee]">{{ $article->desc }}</p>
    </div>
</div>