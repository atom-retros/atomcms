@props(['positions'])

@forelse ($positions as $position)
    <x-staff-applications.item :position="$position" />
@empty
    <x-staff-applications.empty />
@endforelse