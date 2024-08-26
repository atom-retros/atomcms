@props(['icon', 'iconClass', 'amount', 'text'])

<div class="hidden gap-3 md:flex">
    <div @class(['h-6 w-6 rounded-full outline flex items-center justify-center outline-offset-[3px]', $attributes->get('class')])>
        <img src="{{ asset('images/icons/currency/' . $icon . '.png') }}" alt="{{ $icon }}" />
    </div>

    <div class="dark:text-gray-400">
        <span class="font-semibold dark:text-white">
            {{ $amount }}
        </span>

        {{ $text }}
    </div>
</div>