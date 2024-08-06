@props(['categories'])

@foreach ($categories as $category)
    <x-rules.item :category="$category" :rules="$category->rules" />
@endforeach