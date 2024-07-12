@props(['permissions'])

@if ($permissions->pluck('users')->flatten()->isEmpty())
    <x-staff.empty />
@else
    <div class="grid grid-cols-2 gap-6">
        @foreach ($permissions as $permission)
            @foreach($permission->users as $user)
                <x-staff.item :user="$user" :permission="$permission" />
            @endforeach
        @endforeach
    </div>
@endif