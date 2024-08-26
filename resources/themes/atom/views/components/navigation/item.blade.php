@props(['href', 'icon', 'children', 'active' => false, 'dropdown' => false])

<div x-data="{ active: false }" :class="dropdownVisible ? 'block md:block' : 'hidden md:block'" class="relative w-full py-1 md:py-0 md:w-auto" x-transition x-on:click.outside="active = false">
    <a href="{{ $href }}" @class([
        'flex gap-2 px-1 h-auto md:h-[60px] items-center text-[14px] font-semibold uppercase text-gray-700 dark:text-white transition duration-200 ease-in-out md:border-b-4 md:border-transparent md:hover:border-b-[#eeb425]',
        'md:border-b-4 md:border-b-[#eeb425]' => $active,
        $attributes->get('class'),
    ]) @if ($dropdown) x-on:click.prevent="active = !active" @endif>
        <img src="{{ asset('images/icons/navigation/' . $icon . '.png') }}" alt="{{ $icon }}" />

        <span class="flex-1 md:flex-0">{{ $slot }}</span>

        @if ($dropdown)
            <x-icon.arrow />
        @endif
    </a>

    @if (isset($children))
        <x-navigation.dropdown>
            {{ $children }}
        </x-navigation.dropdown>
    @endif
</div>