<x-app-layout>
    @push('title', $article->title)

    <div class="col-span-12 md:col-span-3 rounded space-y-3">
        <div class="rounded h-24 bg-white border w-full overflow-hidden relative mt-6 md:mt-0 shadow dark:bg-gray-800 dark:border-gray-900">
            <div class="absolute right-1 top-1 bg-white rounded px-2 text-sm font-semibold dark:bg-gray-700 dark:text-gray-100">
                {{ !$article->user->hidden_staff ? $article->user->permission->rank_name : 'Member' }}
            </div>

            <div class="h-[65%] w-full staff-bg" style="background: rgba(0, 0, 0, 0.5) url({{ asset(sprintf('assets/images/%s', $article->user->permission->staff_background)) }});"></div>

            <a href="{{ route('profile.show', $article->user->username) }}" class="absolute top-4 drop-shadow left-1 ">
                <img style="image-rendering: pixelated;" class="transition ease-in-out duration-300 hover:scale-105" src="{{ setting('avatar_imager') }}{{ $article->user->look }}&direction=2&head_direction=3&gesture=sml&action=wav" alt="">
            </a>

            <p class="text-2xl font-semibold ml-[70px] text-white -mt-[35px]">
                {{ $article->user->username }}
            </p>

            <div class="w-full flex justify-between px-4 items-center">
                <p class="ml-[57px] text-sm mt-[10px] font-semibold text-gray-500">
                    {{ $article->user->motto }}
                </p>

                <div class="w-4 h-4 rounded-full mt-2 {{ $article->user->online ? 'bg-green-600' : 'bg-red-600' }}"></div>
            </div>
        </div>

        <x-content.content-section icon="hotel-icon" classes="border dark:bg-gray-800 dark:border-gray-900">
            <x-slot:title>
                {{ __('Other articles')  }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Our most recent articles') }}
            </x-slot:under-title>

            <div class="flex flex-col gap-y-2">
                @forelse($otherArticles as $art)
                    <a href="{{ route('article.show', $art->slug) }}"
                       style="background: rgba(0, 0, 0, 0.5) url({{ $art->image }}) center;"
                       class="w-full rounded h-12 bg-blue-200 transition ease-in-out duration-200 hover:scale-[103%] text-white flex justify-center items-center font-bold recent-articles">
                        {{ Str::limit($art->title, 20) }}
                    </a>
                @empty
                    <p class="dark:text-gray-400">
                        {{ __('There is currently no other articles') }}
                    </p>
                @endforelse
            </div>
        </x-content.content-section>
    </div>

    <div class="col-span-12 md:col-span-9 rounded bg-white shadow p-3 flex flex-col gap-y-8 relative overflow-hidden dark:bg-gray-800 dark:text-gray-300">
        <div class="relative rounded h-24 flex items-center justify-center overflow-hidden flex-col gap-y-1 text-white px-2" style="background: url({{ $article->image }}) center; background-size: cover;">
            <div class="bg-black bg-opacity-50 w-full h-full absolute"></div>

            <p class="font-semibold text-center text-xl lg:text-2xl xl:text-3xl relative truncate w-full">{{ $article->title }}</p>
            <p class="relative truncate w-full text-center">{{ $article->short_story }}</p>
        </div>

        <div class="px-2">
            {!! $article->full_story  !!}
        </div>

        @include('community.partials.article-reactions')
    </div>
</x-app-layout>
