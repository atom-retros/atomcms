@props(['category', 'storage' => false])

<x-card.base icon="duo_chat" title="{{ $category->name }}" icon-color="#eec980" content-class="max-w-full prose-sm prose dark:prose-invert">
    <div class="w-full">
        @if ($storage || $category->image_url)
            <img src="{{ $storage ? Storage::url($category->image_url) : sprintf('images/help-center/%s', $category->image_url) }}" alt="{{ $category->name }}" class="inline float-right w-min" />
        @endif

        {!! $category->content !!}

        <a href="{{ $category->button_url ?? '#' }}" class="block mt-3">
            <x-button variant="primary">{{ $category->button_text }}</x-button>
        </a>
    </div>
</x-card.base>