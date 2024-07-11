@props(['position'])

<article class="prose dark:prose-invert">
    <h1>{{ __('staff_applications.title', ['name' => $position->permission->rank_name]) }}</h1>
    <p>{{ $position->description }}</p>
</article>