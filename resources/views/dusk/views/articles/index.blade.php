<x-app-layout>
    @push('title', __('title.news_articles'))

    <x-article.list :articles="$articles" />
</x-app-layout>
