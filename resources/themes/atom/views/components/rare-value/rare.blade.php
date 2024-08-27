@props(['rare'])

<x-card.base>
    <div class="flex flex-col gap-3">
        <div class="flex items-center justify-center w-full h-24 p-3 bg-gray-100 rounded dark:bg-gray-900">
            <img src="{{ $rare->item->icon }}" class="max-h-full" />
        </div>

        <p class="text-sm dark:text-white">{{ $rare->item->public_name }}</p>

        <div class="flex items-center gap-3 px-3 py-1 bg-yellow-400 rounded">
            <img src="{{ asset('images/icons/currency/credits.png') }}" alt="Credits">
            <p class="text-sm font-semibold text-black/70">{{ $rare->credit_value ?? 0 }} {{ __('credits') }}</p>
        </div>

        <div class="flex items-center gap-3 px-3 py-1 bg-gray-600 rounded">
            <img src="{{ asset('images/icons/navigation/shop.png') }}" alt="Shop">
            <p class="text-sm font-semibold text-white/70">{{ $rare->currency_value ?? 0 }} {{ match($rare->currency_type) {
                '0' => 'Duckets',
                '5' => 'Diamonds',
                '101' => 'Seasonal',
                default => 'Other'
            } }}</p>
        </div>
    </div>
</x-card.base>
