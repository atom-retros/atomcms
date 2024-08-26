@props(['photos'])

<x-card.base title="{{ __('Latest Photos') }}" subtitle="{{ __('Have a look at some of the great moments captured by users around the hotel.') }}" icon="camera">
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-4">
        @foreach ($photos as $photo)
            <x-photo.item :photo="$photo" />
        @endforeach

        <div class="col-span-1 sm:col-span-2 md:col-span-4">
            {{ $photos->links() }}
        </div>
    </div>

</x-card.base>
