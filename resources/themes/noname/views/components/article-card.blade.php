@props(['article'])

<a href="{{ route('article.show', $article->slug) }}" class="rounded-lg h-[215px] w-[300px] bg-white shadow relative overflow-hidden transition ease-in-out duration-300 hover:scale-[102%]">
    <div style="background: url('{{ $article->image }}');" class="article-image h-[100px]"></div>

    <div class="px-4">
        <p class="font-semibold text-lg">{{ $article->title }}</p>

        <div class="flex gap-x-1 mt-3 items-center pb-3">
            <div class="h-10 w-10 rounded-full bg-gray-200 overflow-hidden">
                <img class="-mt-1" src="{{ setting('avatar_imager') }}{{ $article->user->look }}&headonly=1" alt="">
            </div>

            <p class="font-semibold">
               {{ $article->user->username }}
            </p>
        </div>
    </div>
</a>