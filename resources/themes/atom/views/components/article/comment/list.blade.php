@props(['article'])

<x-card.base title="{{ __('Comments') }}" subtitle="{{ __('Below you will see all the comments, written on this article') }}" icon="hotel">
    <div class="flex flex-col gap-3">
        @foreach ($article->comments as $comment)
            <x-article.comment.item :comment="$comment" />
        @endforeach
    </div>
</x-card.base>