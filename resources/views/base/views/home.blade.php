<x-app-layout>
    @push('title', __('title.home', ['name' => $settings->get('hotel_name')]))

    <x-user.hero :user="auth()->user()" />

    <x-user.currency.list :user="auth()->user()" :currencies="auth()->user()->currencies" />

    @if ($article)
        <x-article.item :article="$article" />
    @endif

    {{-- @todo - Badges --}}

    {{-- @todo - Groups --}}

    {{-- @todo - Rooms --}}

    {{-- @todo - Friends --}}
</x-app-layout>
