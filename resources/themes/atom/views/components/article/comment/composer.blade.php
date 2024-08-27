@props(['article'])

<x-card.base title="{{ __('Post a comment') }}" subtitle="{{ __('Post a comment on the article, to let us know what you think about it') }}" icon="hotel">
    <x-form.form action="{{ route('community.articles.comments.store', $article) }}" method="POST" class="flex flex-col gap-3">
        <x-form.textarea id="comment" placeholder="{{ __('Leave a comment of your own...') }}" rows="3" />
        <x-button type="submit">Post Comment</x-button>
    </x-form.form>
</x-card.base>