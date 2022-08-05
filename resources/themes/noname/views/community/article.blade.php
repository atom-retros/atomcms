<x-app-layout>
    <div class="col-span-12 md:col-span-3 rounded- space-y-3">
        <div class="rounded-lg h-24 bg-white border w-full overflow-hidden relative mt-6 md:mt-0">
            <div class="absolute right-1 top-1 bg-white rounded px-2 text-sm font-bold">
                {{ $article->user->permission->rank_name }}
            </div>

            <div class="h-[65%] w-full staff-bg"></div>

            <div class="absolute top-4 drop-shadow left-1 ">
                <img style="image-rendering: pixelated;" src="{{ setting('avatar_imager') }}{{ $article->user->look }}&direction=2&head_direction=3&gesture=sml&action=wav" alt="">
            </div>

            <p class="text-2xl font-bold ml-[70px] text-white -mt-[35px]">
                {{ $article->user->username }}
            </p>

            <div class="w-full flex justify-between px-4 items-center">
                <p class="ml-[57px] text-sm mt-[10px] font-bold text-gray-500">
                    {{ $article->user->motto }}
                </p>

                <div class="w-4 h-4 rounded-full mt-2 {{ $article->user->online ? 'bg-green-600' : 'bg-red-600' }}">

                </div>
            </div>
        </div>

        <div class="bg-white border p-4 rounded-lg">
            <div class="text-xl font-bold">
                {{ __('Other articles') }}
                <hr>
            </div>

            <div class="mt-4 flex flex-col">
                @forelse($otherArticles as $art)
                    <div class="flex gap-x-2 text-[#eeb425]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>

                        <a href="{{ route('article.show', $art->slug) }}" class="font-bold transition duration-150 ease-in-out hover:scale-[102%]">
                            {{ $art->title }}
                        </a>
                    </div>
                @empty
                    <p>
                        {{ __('There is currently no other articles') }}
                    </p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-span-12 md:col-span-9 rounded-lg border p-3 flex flex-col gap-y-8 relative overflow-hidden">
        <div class="relative rounded-lg h-24 flex items-center justify-center overflow-hidden" style="background: url({{ $article->image }}) center; background-size: cover;">
            <div class="bg-black bg-opacity-50 w-full h-full absolute"></div>

            <span class="text-white font-bold text-3xl relative">{{ $article->title }}</span>
        </div>

        <div class="px-2">
            {!! $article->full_story  !!}
        </div>
    </div>
</x-app-layout>
