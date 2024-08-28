@props(['article', 'articles'])

<div class="flex flex-col col-span-12 gap-3 rounded md:col-span-3">
    <x-card.base class="!p-0">
        <img src="{{ asset('images/staff-bg.png') }}" alt="background" />
        <p class="px-3 py-2 dark:text-white dark:bg-gray-900">{{ $article->user->username }}</p>
    </x-card.base>

    <x-card.base title="{{ __('Other articles') }}" subtitle="{{ __('Our most recent articles') }}" icon="news" icon-color="#536e5e">
        <div class="flex flex-col gap-3">
            @forelse ($articles as $item)
                <a href="{{ route('community.articles.show', $item) }}" class="flex items-center justify-center w-full p-3 font-medium text-center text-white transition duration-200 ease-in-out bg-blue-200 bg-center rounded hover:scale-105" style="background-image: url({{ Storage::exists($item->image) ? Storage::url($item->image) : $item->image }})">
                    {{ $item->title }}
                </a>
            @empty
                <p class="text-sm text-center dark:text-white">{{ __('There is currently no other articles') }}</p>
            @endforelse
        </div>
    </x-card.base>
</div>