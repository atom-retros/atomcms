@props(['categories'])

@foreach ($categories as $category)
    <x-help-center.item :category="$category" />
@endforeach