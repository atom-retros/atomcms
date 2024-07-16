<x-app-layout>
    @push('title', __('title.profile', ['name' => $user->username]))

    <x-user.hero  :user="$user" />

    <x-user.currency.list :user="$user" :currencies="$user->currencies" />

    {{-- @todo - Badges --}}

    {{-- @todo - Groups --}}

    {{-- @todo - Rooms --}}
    
    {{-- @todo - Friends --}}
</x-app-layout>
