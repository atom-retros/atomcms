@props(['categories'])

<div class="flex flex-col gap-y-6">
    @foreach ($categories as $category)
        <x-rule.item :category="$category" />
    @endforeach
</div>