<x-app-layout>
    <div class="col-span-12 md:col-span-3 rounded-md">
        <div class="bg-white shadow p-4">
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

    <div class="col-span-12 md:col-span-9 rounded shadow p-4 flex flex-col gap-y-8 relative overflow-hidden">
        <div class="text-xl font-bold">
            {{ $article->title }}
            <hr>
        </div>

        <div>
            {!! $article->full_story  !!}
        </div>

        <div class="flex gap-x-3 relative mt-4">
            <div class="absolute -bottom-14">
                <img src="{{ setting('avatar_imager') }}{{ $article->user->look }}&action=std&direction=2&head_direction=3&gesture=sml&size=b" alt="">
            </div>

            <p class="ml-16 font-bold">{{ $article->user->username }}</p>
        </div>
    </div>
</x-app-layout>
