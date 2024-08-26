@props(['photo'])

<a href="{{ $photo->url }}" data-fancybox="gallery" class="cursor-pointer">
    <x-card.base class="!p-0 relative aspect-square">
        <img src="{{ $photo->url }}" alt="{{ $photo->name }}" class="object-cover rounded-sm aspect-square">
        <p class="absolute flex items-center px-3 bg-white rounded-full bottom-3 left-4 gap-x-3 dark:bg-gray-800 dark:text-white">
            {{ $photo->user?->username ?? '-' }}
        </p>
    </x-card.base>
</a>