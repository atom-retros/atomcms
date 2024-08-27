@props(['category'])

<x-card.base title="{{ $category->name }}" subtitle="{{ __('All the :category rares', ['category' => $category->name]) }}" icon="hotel">
    <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
        @foreach($category->rareValues as $rare)
            <x-rare-value.rare :rare="$rare" />
        @endforeach
    </div>
</x-card.base>