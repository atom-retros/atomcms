<x-app-layout>
    @push('title', __('Photos'))

    <div class="col-span-12">
        <x-content.content-section icon="camera-icon">
            <x-slot:title>
                {{ __('Latest Photos') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Have a look at some of the great moments captured by users around the hotel.') }}
            </x-slot:under-title>

            <x-photos :photos="$photos" />
        </x-content.content-section>

        {{ $photos->links() }}
    </div>

    @push('javascript')
        <script src="/assets/js/fancybox.js"></script>
    @endpush

    <link
        rel="stylesheet"
        href="/assets/css/fancybox.css"
    />
</x-app-layout>

