@props(['permissions'])

@foreach ($permissions as $permission)
    <x-staff.item :permission="$permission" />
@endforeach