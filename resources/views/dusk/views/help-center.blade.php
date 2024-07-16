<x-app-layout>
    @push('title', __('title.help_center'))

    <x-help-center.list :categories="$categories" />
</x-app-layout>
