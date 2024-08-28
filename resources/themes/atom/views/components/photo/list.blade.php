@props(['photos', 'guest' => false])

<x-card.base :guest="$guest" title="{{ __('Latest Photos') }}" subtitle="{{ __('Have a look at some of the great moments captured by users around the hotel.') }}" icon="camera" icon-color="#242c31">
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-4">
        @foreach ($photos as $photo)
            <x-photo.item :photo="$photo" />
        @endforeach

        @if ($photos instanceof \Illuminate\Pagination\LengthAwarePaginator && $photos->lastPage() > 1)
            <div class="col-span-1 sm:col-span-2 md:col-span-4">
            {{ $photos->links() }}
            </div>
        @endif
    </div>
</x-card.base>
