@props(['position'])

<x-card class="flex items-center gap-3 bg-gray-100 border-l-4 border-l-yellow-500 p-3 dark:bg-gray-950">
    <div class="flex-1">
        <p class="font-medium">{{ $position->permission->rank_name }}</p>
        <p class="text-xs text-gray-500">{{ $position->apply_from }} - {{ $position->apply_to }}</p>
    </div>

    <a href="{{ route('community.staff-applications.show', $position) }}">
        <x-button.primary>{{ __('buttons.staff_applications.apply') }}</x-button.primary>
    </a>
</x-card>
