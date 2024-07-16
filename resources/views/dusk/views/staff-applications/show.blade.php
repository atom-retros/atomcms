<x-app-layout>
    @push('title', __('title.staff_applications.show', ['name' => $position->permission->rank_name]))

    <x-staff-applications.content :position="$position" />

    <x-staff-applications.composer :position="$position" />
</x-app-layout>
