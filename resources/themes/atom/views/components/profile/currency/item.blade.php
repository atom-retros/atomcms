@props(['amount', 'icon'])

<div @class([
    'flex flex-col items-center justify-center py-3 gap-3 rounded-lg md:rounded-none md:py-0',
    $attributes->get('class'),
])>
    <img src="{{ asset('images/profile/' . $icon . '.png') }}" alt="{{ $icon }}">
    <h4 class="text-2xl font-semibold">{{ $amount }}</h4>
</div>