@props(['positions'])

<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    @forelse($positions as $position)
        <x-staff-application.item :position="$position" />
    @empty
        <x-card.base title="{{ __('No positions open') }}" subtitle="{{ __('There is currently no positions open') }}" icon="lighthouse" class="col-span-1 md:col-span-2">
            <p class="text-sm dark:text-gray-200">{{ __('Please come back at a later time to check if we have any positions open by then! Thank you for your interest.', ['hotel' => $settings->get('hotel_name')]) }}</p>
        </x-card.base>
    @endforelse
</div>