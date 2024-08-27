@props(['categories'])

<div class="flex flex-col gap-3">
    @foreach ($categories as $category)
        <x-rare-value.item :category="$category" />
    @endforeach
</div>
