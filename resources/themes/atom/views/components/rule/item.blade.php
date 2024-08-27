@props(['category'])

<x-card.base icon="hotel" title="{{ $category->name }}" subtitle="{{ $category->description }}" content-class="max-w-full prose dark:prose-invert">
    <ul class="list-decimal">
        @foreach ($category->rules as $rule)
            <li>{{ $rule->rule }}</li>
        @endforeach
    </ul>
</x-card.base>