@props(['currency'])

<div class="flex items-center gap-3 flex-1 px-3 py-2 text-sm font-medium truncate">
    <img src="{{ asset('images/icons/currencies/' . $currency->type . '.png') }}" alt="{{ $currency->type }}" />
    <p>{{ $currency->amount }}</p>
</div>
