<x-app-layout>
    @push('title', $article->title)

    <x-article.hero :article="$article" />

    <x-article.content :article="$article" />

    <x-article.author :article="$article" />

    {{-- @todo - Reactions --}}

    {{-- @todo - Comment Composer --}}

    {{-- @todo - Comments --}}
</x-app-layout>
