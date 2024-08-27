@props(['position'])

<x-card.base title="{{ $position->permission->rank_name }}" subtitle="{{ $position->permission->job_description }}">
    <div class="max-w-full prose-sm prose dark:prose-invert">
        <p>{!! $position->description !!}</p>

        <a href="{{ route('community.staff-applications.show', $position) }}">
            <x-button>{{ __('Apply for :position', ['position' => $position->permission->rank_name]) }}</x-button>
        </a>
    </div>
</x-card.base>