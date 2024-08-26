@props(['teams'])

@foreach ($teams as $team)
    <x-team.item :team="$team" />
@endforeach