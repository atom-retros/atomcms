<x-app-layout>
    <x-content-section icon="hotel-icon">
        <x-slot:title>
            Latest news
        </x-slot:title>

        <x-slot:under-title>
            Keep up to date with the latest hotel gossip.
        </x-slot:under-title>

        <x-article-card />
    </x-content-section>

    <x-content-section icon="camera-icon">
        <x-slot:title>
            Latest Photos
        </x-slot:title>

        <x-slot:under-title>
            Have a look at some of the great moments captured by Habbos around the hotel.
        </x-slot:under-title>

        {{-- Content here --}}
    </x-content-section>
</x-app-layout>
