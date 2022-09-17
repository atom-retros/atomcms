@props(['article'])

<div class="h-[210px] rounded w-full bg-white shadow relative overflow-hidden" onmouseover="slideImage()" onmouseleave="unslideImage()">
    <a href="{{ route('article.show', $article->slug) }}">
        <div id="article-{{ $article->id }}" style="background: url('{{ $article->image }}');" class="article-image"></div>

        <div class="mt-4 px-4">
            <p class="font-bold text-lg">
                {{ $article->title }}
            </p>

            <div class="flex items-center gap-x-2">
                <div class="h-10 w-10 bg-gray-100 rounded-full mt-3 flex items-center justify-center overflow-hidden">
                    <img src="{{ setting('avatar_imager') }}{{ $article->user->look }}&headonly=1" alt="">
                </div>

                <p class="font-semibold mt-4">
                    {{ $article->user->username }}
                </p>
            </div>
        </div>
    </a>
</div>

<script>
    function slideImage() {
        document.getElementById('article-{{ $article->id }}').classList.add('article-image-slide');
    }

    function unslideImage() {
        document.getElementById('article-{{ $article->id }}').classList.remove('article-image-slide');
    }
</script>