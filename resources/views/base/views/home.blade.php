<x-app-layout>
    @push('title', __('title.home', ['name' => $settings->get('hotel_name')]))

    <x-user.hero :user="request()->user()" />

    <x-user.currency.list :currencies="request()->user()->currencies" />

    <x-article.item :article="$article" />

    {{-- @todo - Badges --}}

    {{-- @todo - Groups --}}

    {{-- @todo - Rooms --}}

    {{-- @todo - Friends --}}
</x-app-layout>
