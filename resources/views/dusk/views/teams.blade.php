<x-app-layout>
    @push('title', __('title.teams', ['name' => $settings->get('hotel_name')]))

    <x-team.list :teams="$teams" />
</x-app-layout>
