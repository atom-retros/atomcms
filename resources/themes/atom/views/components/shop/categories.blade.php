@props(['categories'])

<x-card.base title="{{ __('Categories') }}" icon="catalog" icon-color="rgba(141, 74, 183, .51)">
    <div class="flex flex-col gap-3">
        <a href="{{ route('shop.index') }}">
            <x-button variant="secondary" block>{{ __('All Categories') }}</x-button>
        </a>

        @foreach ($categories as $category)
            <a href="{{ route('shop.index', ['category_id' => $category->id]) }}">
                <x-button variant="secondary" block>{{ $category->name }}</x-button>
            </a>
        @endforeach
    </div>
</x-card.base>