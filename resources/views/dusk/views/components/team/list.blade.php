@props(['teams'])

@if ($teams->pluck('users')->flatten()->isEmpty())
    <x-team.empty />
@else
    <div class="grid grid-cols-2 gap-6">
        @foreach ($teams as $team)
            @foreach($team->users as $user)
                <x-team.item :user="$user" :team="$team" />
            @endforeach
        @endforeach
    </div>
@endif