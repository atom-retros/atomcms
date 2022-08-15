<x-app-layout>
    @push('title', __('Leaderboard'))

    <div class="col-span-12">
        <div class="grid grid-cols-3 gap-5">
            <div class="p-2 shadow rounded-md">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1">
                    <div class="flex items-center">
                        <img src="https://habstar.net/assets/images/icons/credits.png" alt="credits" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Top credits') }}
                </div>
                <hr>

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($credits as $index => $user)
                        <div class="p-3 rounded-md bg-gray-200 flex gap-x-2 items-center h-[70px] overflow-hidden">
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
                                <p class="font-bold text-gray-700">
                                    {{ $user->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600">
                                    {{ __(':credits credits', ['credits' => $user->credits]) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded-md">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1">
                    <div class="flex items-center">
                        <img src="https://habstar.net/assets/images/icons/duckets.png" alt="credits" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Top duckets') }}
                </div>
                <hr>

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($duckets as $index => $currency)
                        <div class="p-3 rounded-md bg-gray-200 flex gap-x-2 items-center h-[70px] overflow-hidden">
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
                                <p class="font-bold text-gray-700">
                                    {{ $currency->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600">
                                    {{ __(':duckets duckets', ['duckets' => $currency->amount]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded-md">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1">
                    <div class="flex items-center">
                        <img src="https://habstar.net/assets/images/icons/diamond.png" alt="credits" class="w-4" style="image-rendering: pixelated;">
                    </div>
                    {{ __('Top diamonds') }}
                </div>
                <hr>

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($diamonds as $index => $currency)
                        <div class="p-3 rounded-md bg-gray-200 flex gap-x-2 items-center h-[70px] overflow-hidden">
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
                                <p class="font-bold text-gray-700">
                                    {{ $currency->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600">
                                    {{ __(':diamonds diamonds', ['diamonds' => $currency->amount]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded-md">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1">
                    {{ __('Hours online') }}
                </div>
                <hr>

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($mostOnline as $index => $onlineTime)
                        <div class="p-3 rounded-md bg-gray-200 flex gap-x-2 items-center h-[70px] overflow-hidden">
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
                                <p class="font-bold text-gray-700">
                                    {{ $onlineTime->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600">
                                    {{ __(':online hours', ['online' => round($onlineTime->online_time / 3600)]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded-md">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1">
                    {{ __('Respects received') }}
                </div>
                <hr>

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($respectsReceived as $index => $respect)
                        <div class="p-3 rounded-md bg-gray-200 flex gap-x-2 items-center h-[70px] overflow-hidden">
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
                                <p class="font-bold text-gray-700">
                                    {{ $respect->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600">
                                    {{ __(':respect respects received', ['respect' =>  $respect->respects_received]) }}
                                </p>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-2 shadow rounded-md">
                <div class="text-center font-semibold text-gray-700 flex justify-center gap-x-1">
                    {{ __('Achievement score') }}
                </div>
                <hr>

                <div class="flex flex-col gap-y-3 mt-4">
                    @foreach($achievementScores as $index => $achievement)
                        <div class="p-3 rounded-md bg-gray-200 flex gap-x-2 items-center h-[70px] overflow-hidden">
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
                                <p class="font-bold text-gray-700">
                                    {{ $achievement->user?->username }}
                                </p>

                                <p class="text-sm font-bold text-gray-600">
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
