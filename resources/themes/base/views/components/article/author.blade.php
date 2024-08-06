@props(['article'])

<a href="{{ route('profiles', $article->user) }}" class="flex items-center gap-6 group">
    <button class="flex items-center justify-center w-12 h-12 bg-blue-500 rounded-full ring-4 group-hover:bg-blue-600">
        <x-avatar username="{{ $article->user->username }}" figure="{{ $article->user->look }}" headonly />
    </button>
    <div class="flex flex-col gap-1">
        <p>{{ $article->user->username }}</p>
        <time datetime="{{ $article->created_at->format('Y-m-d  H:i:s') }}" class="text-xs text-gray-400">{{ $article->created_at->format('F j, Y H:i') }}</time>
    </div>
</a>