<x-app-layout>
    @push('title', __('title.staff', ['name' => $settings->get('hotel_name')]))

    <x-staff.list :permissions="$permissions" />

    <a href="{{ route('community.staff-applications.index')}}" class="flex w-full">
        <x-button.primary class="w-full">{{ __('buttons.open_positions')}}</x-button.primary>
    </a>
</x-app-layout>
