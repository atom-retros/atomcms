@extends('layouts.app')

@push('title', __('Leaderboard'))

@section('content')
    <div class="flex flex-col col-span-12 gap-3">
        <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
            <x-leaderboard.list
                class="bg-[#e9b124] outline-[#b26d18]"
                title="{{ __('Top credits') }}"
                icon="credits.png"
                :items="$credits"
                :fn="fn ($user) => $user->credits"
            />

            <x-leaderboard.list
                class="bg-[#c44aac] outline-[#812378]"
                title="{{ __('Top duckets') }}"
                icon="duckets.png"
                :items="$duckets"
                :fn="fn ($user) => $user->currencies->firstWhere('type', 0)?->amount ?? 0"
            />

            <x-leaderboard.list
                class="bg-[#caf1f3] outline-[#6caff4]"
                title="{{ __('Top diamonds') }}"
                icon="diamond.png"
                :items="$diamonds"
                :fn="fn ($user) => $user->currencies->firstWhere('type', 5)?->amount ?? 0"
            />

            <x-leaderboard.list
                class="bg-red-400 outline-red-500"
                title="{{ __('Hours online') }}"
                icon="clock.gif"
                :items="$onlineTimes"
                :fn="fn ($user) => round($user->setting->online_time / 3600)"
            />

            <x-leaderboard.list
                class="bg-red-400 outline-red-500"
                title="{{ __('Respects received') }}"
                icon="heart.gif"
                :items="$respects"
                :fn="fn ($user) => $user->setting->respects_received"
            />

            <x-leaderboard.list
                class="bg-[#e9b124] outline-[#b26d18]"
                title="{{ __('Achievement score') }}"
                icon="star.gif"
                :items="$achievements"
                :fn="fn ($user) => $user->setting->achievement_score"
            />
        </div>
    </div>
@endsection