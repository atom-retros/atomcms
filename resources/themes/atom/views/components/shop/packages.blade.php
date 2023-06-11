<x-content.content-card icon="{{$article->icon}}" classes="border dark:border-gray-900">
    <x-slot:title>
        {{ $article->name }}
    </x-slot:title>

    <x-slot:under-title>
        {{ $article->info }}
    </x-slot:under-title>

    <div class="flex flex-col dark:text-white">
        <p class="font-semibold">{{ __('You will receive:') }}</p>

        <ul class="list-disc pl-4">
            @if ($article->credits)
                <li class="ml-3">{{ number_format($article->credits, 0, '.', '.') }} credits</li>
            @endif
            @if ($article->duckets)
                <li class="ml-3">{{ number_format($article->duckets, 0, '.', '.') }} duckets</li>
            @endif
            @if ($article->diamonds)
                <li class="ml-3">{{ number_format($article->diamonds, 0, '.', '.') }} diamonds</li>
            @endif
        </ul>
    </div>

    @if (empty($article->badges) === false)
        <div class="flex flex-col dark:text-white">
            <p class="font-semibdol">Badges:</p>
            <div class="flex gap-2">
                @foreach (explode(';', $article->badges) as $badge)
                    <img data-tippy-content="{{ $badge }}" class="user-badge" src="/client/flash/c_images/album1584/{{$badge}}.png" alt="{{ $badge }}" width="40" height="40">
                @endforeach
            </div>
        </div>
    @endif

    @if (!empty($article->furnis))
        <div class="flex flex-col dark:text-white">
            <p class="font-semibdol">Furnis:</p>
            <div class="flex gap-2">
                @foreach ($article->furniItems() as $furni)
                    <img data-tippy-content="{{ $furni->public_name }}" class="user-badge" src="{{$furni->icon()}}" alt="{{ $furni->public_name }}" width="36" height="36">
                @endforeach
            </div>
        </div>
    @endif

    <div class="pt-2 mt-auto">
        <form action="{{ route('shop.buy', $article) }}" method="POST">
            @csrf

            <button type="submit" class="w-full rounded bg-green-600 hover:bg-green-700 text-white p-2 border-2 border-green-500 transition ease-in-out duration-150 font-semibold">
                {{ __('Buy for $:cost', ['cost' => $article->costs]) }}
            </button>
        </form>
    </div>
</x-content.content-card>
