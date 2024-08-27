@props(['article'])

<div class="col-span-12 space-y-4 md:col-span-9">
    <x-article.content :article="$article" />

    @if ($article->can_comment)
        <x-article.comment.composer :article="$article" />
        <x-article.comment.list :article="$article" />
    @endif
</div>