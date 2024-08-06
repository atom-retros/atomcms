@props(['category', 'rules'])

<x-card>
    <x-slot name="title">
        <div class="flex flex-col gap-1">
            <p>{{ $category->name }}</p>
            <p class="font-normal text-xs text-gray-500">{{ $category->description }}</p>
        </div>
    </x-slot>

    <div class="prose prose-sm dark:prose-invert p-3 dark:bg-gray-950">
        <ol>
            @foreach ($rules as $rule)
                <li>{{ $rule->rule }}</li>
            @endforeach
        </ol>
    </div>
</x-card>
