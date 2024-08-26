@props(['categories', 'small' => false])

<div class="flex flex-col w-full gap-3 {{ $small ? 'lg:w-2/5' : 'lg:w-3/5' }}">
    @foreach($categories as $category)
        <x-help-center.item :category="$category" :storage="Storage::exists($category->image_url ?: '-')" />
    @endforeach
</div>
