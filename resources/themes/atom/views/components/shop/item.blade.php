@props(['article'])

<x-card.base title="{{ $article->name }}" subtitle="{{ $article->info }}" icon-src="{{ $article->icon_url }}" icon-color="{{ $article->color }}">
    <x-form.form route="{{ route('shop.purchase', $article) }}" class="grid grid-cols-1 gap-3">
        <div class="grid grid-cols-2 gap-3 md:grid-cols-6">
            @foreach ($article->badgeItems as $badge)
                <x-shop.badge :badge="$badge" />
            @endforeach

            @foreach ($article->items as $furniture)
                <x-shop.furni :furniture="$furniture" />
            @endforeach
        </div>

        <article class="prose-sm prose dark:prose-invert">
            <h3>{{ __('You will receive:') }}</h3>

            <ul>
                @if ($article->credits)<li>{{ $article->credits }} {{ __('Credits') }}</li>@endif
                @if ($article->duckets)<li>{{ $article->duckets }} {{ __('Duckets') }}</li>@endif
                @if ($article->diamonds)<li>{{ $article->diamonds }} {{ __('Diamonds') }}</li>@endif
                @if ($article->rank)<li>{{ $article->rank->rank_name }}</li>@endif
            </ul>
        </article>

        <x-button type="submit" variant="secondary">
            {{ __('Buy for $:cost', ['cost' => $article->costs]) }}
        </x-button>
    </x-form.form>
</x-card.base>