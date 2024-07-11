@props(['teams'])

<div class="grid grid-cols-2 gap-6">
    @foreach ($teams as $team)
        @foreach($team->users as $user)
            <x-team.item :user="$user" :team="$team" />
        @endforeach
    @endforeach
</div>