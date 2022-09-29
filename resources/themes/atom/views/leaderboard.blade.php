<x-app-layout>
    @push('title', __('Leaderboard'))

    <div class="col-span-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="p-2 shadow rounded bg-white dark:bg-gray-900">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1 dark:text-gray-300">
                    <div class="flex items-center">
                        <img src="{{ asset('/assets/images/icons/credits.png') }}" alt="credits" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Top credits') }}
                </div>
                <hr class="dark:border-gray-500">

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($credits as $index => $user)
                        <div class="p-3 rounded bg-gray-100 flex gap-x-2 items-center h-[70px] overflow-hidden dark:bg-gray-800">
                            <div @class([
                                        'w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center',
                                        'leaderboard-first' => $index + 1 == 1,
                                        'leaderboard-second' => $index + 1 == 2,
                                        'leaderboard-third' => $index + 1 == 3,
                                    ])>
                                {{ $index  + 1 }}
                            </div>

                            <img
                                @class([
                                    'mt-8' => !Str::contains(setting('avatar_imager'), 'www.habbo.com'),
                                ])
                                 src="{{ setting('avatar_imager') }}{{ $user->look }}&size=b&head_direction=2&gesture=sml&headonly=1"
                                 alt="" />

                            <div class="flex flex-col">
                                <p class="font-bold text-gray-700 dark:text-gray-100">
                                    {{ $user->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600 dark:text-gray-400">
                                    {{ __(':credits credits', ['credits' => $user->credits]) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded bg-white dark:bg-gray-900">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1 dark:text-gray-300">
                    <div class="flex items-center">
                        <img src="{{ asset('/assets/images/icons/duckets.png') }}" alt="credits" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Top duckets') }}
                </div>
                <hr class="dark:border-gray-500">

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($duckets as $index => $currency)
                        <div class="p-3 rounded bg-gray-100 flex gap-x-2 items-center h-[70px] overflow-hidden dark:bg-gray-800">
                            <div @class([
                                        'w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center',
                                        'leaderboard-first' => $index + 1 == 1,
                                        'leaderboard-second' => $index + 1  == 2,
                                        'leaderboard-third' => $index + 1  == 3,
                                    ])>
                                {{ $index + 1  }}
                            </div>

                            <img
                                    @class([
                                        'mt-8' => !Str::contains(setting('avatar_imager'), 'www.habbo.com'),
                                    ])
                                    src="{{ setting('avatar_imager') }}{{ $currency->user?->look }}&size=b&head_direction=2&gesture=sml&headonly=1"
                                    alt="" />

                            <div class="flex flex-col">
                                <p class="font-bold text-gray-700 dark:text-gray-100">
                                    {{ $currency->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600 dark:text-gray-400">
                                    {{ __(':duckets duckets', ['duckets' => $currency->amount]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded bg-white dark:bg-gray-900">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1 dark:text-gray-300">
                    <div class="flex items-center">
                        <img src="{{ asset('/assets/images/icons/diamond.png') }}" alt="credits" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Top diamonds') }}
                </div>
                <hr class="dark:border-gray-500">

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($diamonds as $index => $currency)
                        <div class="p-3 rounded bg-gray-100 flex gap-x-2 items-center h-[70px] overflow-hidden dark:bg-gray-800">
                            <div @class([
                                        'w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center',
                                        'leaderboard-first' => $index + 1  == 1,
                                        'leaderboard-second' => $index + 1  == 2,
                                        'leaderboard-third' => $index + 1  == 3,
                                    ])>
                                {{ $index + 1  }}
                            </div>

                            <img
                                    @class([
                                        'mt-8' => !Str::contains(setting('avatar_imager'), 'www.habbo.com'),
                                    ])
                                    src="{{ setting('avatar_imager') }}{{ $currency->user?->look }}&size=b&head_direction=2&gesture=sml&headonly=1"
                                    alt="" />

                            <div class="flex flex-col">
                                <p class="font-bold text-gray-700 dark:text-gray-100">
                                    {{ $currency->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600 dark:text-gray-400">
                                    {{ __(':diamonds diamonds', ['diamonds' => $currency->amount]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded bg-white dark:bg-gray-900">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1 dark:text-gray-300">
                    <div class="flex items-center">
                        <img src="{{ asset('/assets/images/icons/clock.gif') }}" alt="clock" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Hours online') }}
                </div>
                <hr class="dark:border-gray-500">

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($mostOnline as $index => $onlineTime)
                        <div class="p-3 rounded bg-gray-100 flex gap-x-2 items-center h-[70px] overflow-hidden dark:bg-gray-800">
                            <div @class([
                                        'w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center',
                                        'leaderboard-first' => $index + 1  == 1,
                                        'leaderboard-second' => $index + 1  == 2,
                                        'leaderboard-third' => $index + 1  == 3,
                                    ])>
                                {{ $index + 1  }}
                            </div>

                            <img
                                    @class([
                                        'mt-8' => !Str::contains(setting('avatar_imager'), 'www.habbo.com'),
                                    ])
                                    src="{{ setting('avatar_imager') }}{{ $onlineTime->user?->look }}&size=b&head_direction=2&gesture=sml&headonly=1"
                                    alt="" />

                            <div class="flex flex-col">
                                <p class="font-bold text-gray-700 dark:text-gray-100">
                                    {{ $onlineTime->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600 dark:text-gray-400">
                                    {{ __(':online hours', ['online' => round($onlineTime->online_time / 3600)]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded bg-white dark:bg-gray-900">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1 dark:text-gray-300">
                    <div class="flex items-center">
                        <img src="{{ asset('/assets/images/icons/heart.gif') }}" alt="heart" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Respects received') }}
                </div>
                <hr class="dark:border-gray-500">

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($respectsReceived as $index => $respect)
                        <div class="p-3 rounded bg-gray-100 flex gap-x-2 items-center h-[70px] overflow-hidden dark:bg-gray-800">
                            <div @class([
                                        'w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center',
                                        'leaderboard-first' => $index + 1  == 1,
                                        'leaderboard-second' => $index + 1  == 2,
                                        'leaderboard-third' => $index + 1  == 3,
                                    ])>
                                {{ $index + 1  }}
                            </div>

                            <img
                                    @class([
                                        'mt-8' => !Str::contains(setting('avatar_imager'), 'www.habbo.com'),
                                    ])
                                    src="{{ setting('avatar_imager') }}{{ $respect->user?->look }}&size=b&head_direction=2&gesture=sml&headonly=1"
                                    alt="" />

                            <div class="flex flex-col">
                                <p class="font-bold text-gray-700 dark:text-gray-100">
                                    {{ $respect->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600 dark:text-gray-400">
                                    {{ __(':respect respects received', ['respect' =>  $respect->respects_received]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded bg-white dark:bg-gray-900">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1 dark:text-gray-300">
                    <div class="flex items-center">
                        <img src="{{ asset('/assets/images/icons/star.gif') }}" alt="star" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Achievement score') }}
                </div>
                <hr class="dark:border-gray-500">

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($achievementScores as $index => $achievement)
                        <div class="p-3 rounded bg-gray-100 flex gap-x-2 items-center h-[70px] overflow-hidden dark:bg-gray-800">
                            <div @class([
                                        'w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center',
                                        'leaderboard-first' => $index + 1  == 1,
                                        'leaderboard-second' => $index + 1  == 2,
                                        'leaderboard-third' => $index + 1  == 3,
                                    ])>
                                {{ $index + 1  }}
                            </div>

                            <img
                                    @class([
                                        'mt-8' => !Str::contains(setting('avatar_imager'), 'www.habbo.com'),
                                    ])
                                    src="{{ setting('avatar_imager') }}{{ $achievement->user?->look }}&size=b&head_direction=2&gesture=sml&headonly=1"
                                    alt="" />

                            <div class="flex flex-col">
                                <p class="font-bold text-gray-700 dark:text-gray-100">
                                    {{ $achievement->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600 dark:text-gray-400">
                                    {{ __(':achievement achievement score', ['achievement' => $achievement->achievement_score]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
