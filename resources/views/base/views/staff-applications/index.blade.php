<x-app-layout>
    @push('title', __('title.staff_applications.index'))

    <x-staff-applications.list :positions="$positions" />
</x-app-layout>
