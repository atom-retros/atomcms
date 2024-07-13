<x-app-layout>
    @push('title', __('title.leaderboards'))

    <x-leaderboard.list
        :users="$credits"
        :value="fn ($user) => __('value.credits', ['value' => $user->credits])"
        title="{{ __('leaderboards.credits') }}"
        icon="currencies/-1.png"
    />

    <x-leaderboard.list
        :users="$duckets"
        :value="fn ($user) => __('value.duckets', ['value' => $user->currencies->firstWhere('type', 0)->amount])"
        title="{{ __('leaderboards.duckets') }}"
        icon="currencies/0.png"
    />

    <x-leaderboard.list
        :users="$diamonds"
        :value="fn ($user) => __('value.diamonds', ['value' => $user->currencies->firstWhere('type', 5)->amount])"
        title="{{ __('leaderboards.diamonds') }}"
        icon="currencies/5.png"
    />

    <x-leaderboard.list
        :users="$onlineTimes"
        :value="fn ($user) => __('value.hours', ['value' => round($user->settings->online_time/3600, 2)])"
        title="{{ __('leaderboards.hours') }}"
        icon="dove.png"
    />

    <x-leaderboard.list
        :users="$respects"
        :value="fn ($user) => __('value.respects_recieved', ['value' => $user->settings->respects_received])"
        title="{{ __('leaderboards.respects_recieved') }}"
        icon="heart.png"
    />

    <x-leaderboard.list
        :users="$achievements"
        :value="fn ($user) => __('value.achievement_score', ['value' => $user->settings->achievement_score])"
        title="{{ __('leaderboards.achievement_score') }}"
        icon="star.png"
    />
</x-app-layout>
