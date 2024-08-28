@extends('layouts.app')

@push('title', __('Rare values'))

@section('content')
    <div class="flex flex-col col-span-12 gap-3 lg:col-span-9">
        <x-rare-value.list :categories="$categories" />
    </div>

    <div class="flex flex-col col-span-12 gap-3 lg:col-span-3">
        <x-card.base title="{{ __('Search') }}" subtitle="{{ __('Search for rares') }}" icon="catalog" icon-color="rgba(141, 74, 183, .51)">
            <x-form.form route="{{ route('rare-values', request()->query()) }}" method="GET" class="flex flex-col gap-3">
                <x-form.input id="search" value="{{ request()->query('search') }}"
                    placeholder="{{ __('Search for rares') }}" />
                <x-button type="submit" variant="secondary">{{ __('Search') }}</x-button>
            </x-form.form>
        </x-card.base>

        <x-card.base title="{{ __('Rare categories') }}" subtitle="{{ __('Select a category below') }}" icon="furni" icon-color="#232138">
            <div class="flex flex-col gap-3">
                <a href="{{ route('rare-values') }}">
                    <x-button variant="secondary">{{ __('All values') }}</x-button>
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('rare-values', [...request()->query(), 'category_id' => $category->id]) }}">
                        <x-button variant="secondary">{{ $category->name }}</x-button>
                    </a>
                @endforeach
            </div>
        </x-card.base>
    </div>
@endsection
