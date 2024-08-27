@props(['article'])

<x-card.base class="dark:bg-gray-900">
    <div class="relative flex flex-col justify-center w-full h-24 p-2 mb-3 overflow-hidden text-white bg-blue-300 bg-center bg-cover rounded" style="background-image: url({{ Storage::exists($article->image) ? Storage::url($article->image) : $article->image }})">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <p class="relative w-full text-xl font-semibold text-center truncate lg:text-2xl xl:text-3xl">{{ $article->title }}</p>
        <p class="relative w-full text-center truncate">{{ $article->short_story }}</p>
    </div>

    <article class="prose-sm prose !max-w-full dark:prose-invert prose-a:text-blue-500 prose-img:inline prose-img:!my-0 mb-3">
        {!! $article->full_story !!}
    </article>

    <x-article.reactions :article="$article" />
</x-card.base>