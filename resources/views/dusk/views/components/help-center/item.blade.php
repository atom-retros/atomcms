@props(['category'])

<x-card class="">
    <x-slot name="title">
        {{ $category->name }}
    </x-slot>
    <div class="prose prose-sm dark:prose-invert p-3 dark:bg-gray-950">
        @if ($category->image_url)
            <img class="float-right px-2" src="{{ asset('images/' . $category->image_url) }}" alt="{{ $category->name }}">
        @endif
        {!! $category->content !!}

        <a href="{{ $category->button_url }}">
            <x-button.primary class="w-full mt-3">
                {{ $category->button_text }}
            </x-button.primary>
        </a>
    </div>
</x-card>
