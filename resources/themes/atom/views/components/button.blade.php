@props(['variant' => 'primary', 'type' => 'button', 'disabled' => false])

<button
    {{ $attributes->merge(['type' => $type ]) }}
    @disabled($disabled)
    @class([
        'w-full rounded p-2 border-2 text-white transition ease-in-out duration-200 font-semibold',
        'bg-[#eeb425] hover:bg-[#d49f1c] border-yellow-400' => $variant === 'primary',
        'bg-green-600 hover:bg-green-700 border-green-500' => $variant === 'secondary',
        'bg-red-500 hover:bg-red-600 border-red-400' => $variant === 'danger',
        'disabled:opacity-50 disabled:cursor-normal' => $disabled,
        $attributes->get('class'),
    ])
>
    {{ $slot }}
</button>