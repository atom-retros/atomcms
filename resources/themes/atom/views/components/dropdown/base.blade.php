@props(['children', 'alignment' => 'left'])

<div x-data="{ active: false }" {{ $attributes->merge(['class' => 'relative']) }} x-transition x-on:click.outside="active = false">
    <button class="flex items-center gap-3 text-gray-800 cursor-pointer hover:text-gray-900 dark:text-gray-300 dark:hover:text-white" x-on:click="active = !active">{{ $slot }}</button>

    @isset($children)
        <div x-show="active" @class([
            'absolute z-10 min-w-full md:min-w-[150px] py-px mt-2 overflow-hidden bg-white rounded shadow top-full dark:bg-gray-800 whitespace-nowrap',
            'left-0' => $alignment === 'left',
            'right-0' => $alignment === 'right',
        ]) x-transition.offset.top.left>
            {{ $children }}
        </div>    
    @endisset
</div>